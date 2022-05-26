<?php // phpcs:disable WordPress.Files.FileName.NotHyphenatedLowercase

/**
 * Custom Sensors for the fabulatheque website.
 *
 * Class file for alert manager.
 *
 * @since   1.0.0
 * @package wsal
 * @subpackage wsal-fabulatheque
 */
class WSAL_Sensors_LearnPressSensor extends WSAL_AbstractSensor {

    /**
     * Hook events related to the sensor.
     */
    public function HookEvents() {
        /*
         * LearnPress sensors
         */
        // courses and lessons
        add_action( 'learnpress/user/course-enrolled', array( $this, 'LogLPCourseEnroll' ), 10, 3 );
        add_action( 'learn-press/user-completed-lesson', array( $this, 'LogLPLessonComplete' ), 10, 3 );
        add_action( 'learn-press/user-course-finished', array( $this, 'LogLPCourseFinished' ), 10, 3 );

        // quizzes
        add_action( 'learn-press/user/quiz-started', array( $this, 'LogLPQuizStarted' ), 10, 3 );
        add_action( 'learn-press/user/quiz-finished', array( $this, 'LogLPQuizFinished' ), 10, 3 );
        add_action( 'learn-press/user/quiz-retried', array( $this, 'LogLPQuizRetried' ), 10, 3 );

        /*
         * GamiPress sensors
         */
        // Points
        add_action( 'gamipress_award_points_to_user', array( $this, 'LogGPPointsAwarded' ), 10, 4 );
        add_action( 'gamipress_deduct_points_to_user', array( $this, 'LogGPPointsDeducted' ), 10, 4 );
        add_action( 'gamipress_update_user_points', array( $this, 'LogGPPointsUpdated' ), 10, 8 );

        // Ranks
        add_action( 'gamipress_update_user_rank', array( $this, 'LogGPRankUpdated' ), 10, 5 );

        // Achievements
        add_action( 'gamipress_award_achievement', array( $this, 'LogGPAchievementAwarded' ), 10, 5 );
        add_action( 'gamipress_revoke_achievement_to_user', array( $this, 'LogGPAchievementRevoked' ), 10, 3 );
    }

    /**
     * Log user enrollment to LearnPress courses
     */
    public function LogLPCourseEnroll( $order_id, $course_id, $user_id ) {
        $alert_code = 1010000;

        // Very important: these variable will also show up in the wsal_metadata
        // database table.
        $variables = array(
            'UserId' => esc_html( $user_id ),
            'CourseId' => esc_html( $course_id ),
        );
        // TODO(low): find a way to show the course name

        $this->plugin->alerts->Trigger( $alert_code, $variables );
    }

    /**
     * Log user progress to LearnPress courses: when they complete a lesson
     */
    public function LogLPLessonComplete( $lesson_id, $course_id, $user_id ) {
        $alert_code = 1010001;

        // Very important: these variable will also show up in the wsal_metadata
        // database table.
        $variables = array(
            'UserId' => esc_html( $user_id ),
            'CourseId' => esc_html( $course_id ),
            'LessonId' => esc_html( $lesson_id ),
        );
        // TODO: find a way to show the course name

        $this->plugin->alerts->Trigger( $alert_code, $variables );
    }

    /**
     * Log users finishing a LearnPress course
     */
    public function LogLPCourseFinished( $course_id, $user_id, $return_status ) {
        $alert_code = 1010002;

        // Very important: these variable will also show up in the wsal_metadata
        // database table.
        $variables = array(
            'UserId' => esc_html( $user_id ),
            'CourseId' => esc_html( $course_id ),
        );
        // TODO: find a way to show the course name

        $this->plugin->alerts->Trigger( $alert_code, $variables );
    }

    /**
     * Log a LearnPress quiz-related event
     */
    private function LogLPQuizEvent( $alert_code, $quiz_id, $course_id, $user_id ) {
        // Very important: these variable will also show up in the wsal_metadata
        // database table.
        $variables = array(
            'UserId' => esc_html( $user_id ),
            'CourseId' => esc_html( $course_id ),
            'QuizId' => esc_html( $quiz_id ),
        );
        // TODO: find a way to show the course name

        $this->plugin->alerts->Trigger( $alert_code, $variables );
    }

    /**
     * Log users starting a quiz in LearnPress course
     */
    public function LogLPQuizStarted( ...$args ) {
        $this->LogLPQuizEvent( 1010003, ...$args );
    }

    /**
     * Log users starting a quiz in LearnPress course
     */
    public function LogLPQuizFinished( ...$args ) {
        $this->LogLPQuizEvent( 1010004, ...$args );
    }

    /**
     * Log users starting a quiz in LearnPress course
     */
    public function LogLPQuizRetried( ...$args ) {
        $this->LogLPQuizEvent( 1010005, ...$args );
    }

    /**
     * Log a GamiPress points-related event
     */
    public function LogGPPointsUpdated( $user_id, $new_points, $total_points, $admin_id, $achievement_id, $points_type, $reason, $log_type ) {
        // Very important: these variable will also show up in the wsal_metadata
        // database table.
        $variables = array(
            'UserId' => esc_html( $user_id ),
            'PointsChange' => esc_html( $new_points ),
            'PointsType' => esc_html( $points_type ),
            'NewTotal' => esc_html( $total_points ),
            'Reason' => esc_html( $extra_info['reason'] ),
            'RelatedAchievement' => esc_html( $extra_info['achievement_id'] ),
        );

        $this->plugin->alerts->Trigger( 1020000, $variables );
    }

    /**
     * Log users having their GamiPress rank updated
     */
    public function LogGPRankUpdated( $user_id, $new_rank, $old_rank, $admin_id, $achievement_id ) {
        // Very important: these variable will also show up in the wsal_metadata
        // database table.
        $variables = array(
            'UserId' => esc_html( $user_id ),
            'OldRank' => esc_html( $old_rank->post_name ),
            'NewRank' => esc_html( $new_rank->post_name ),
            'RelatedAchievement' => esc_html( $extra_info['achievement_id'] ),
        );

        $this->plugin->alerts->Trigger( 1020001, $variables );
    }

    /**
     * Log users being awarded a GamiPress achievement
     */
    public function LogGPAchievementAwarded( $user_id, $achievement_id, $trigger, $site_id, $extra_info ) {
        // Very important: these variable will also show up in the wsal_metadata
        // database table.
        $variables = array(
            'UserId' => esc_html( $user_id ),
            'AchievementId' => esc_html( $achievement_id ),
        );

        $this->plugin->alerts->Trigger( 1020002, $variables );
    }

    /**
     * Log users having a GamiPress achievement revoked
     */
    public function LogGPAchievementRevoked( $user_id, $achievement_id, $earning_id ) {
        // Very important: these variable will also show up in the wsal_metadata
        // database table.
        $variables = array(
            'UserId' => esc_html( $user_id ),
            'AchievementId' => esc_html( $achievement_id ),
            'EarningId' => esc_html( $earning_id ),
        );

        $this->plugin->alerts->Trigger( 1020003, $variables );
    }
}
