<?php // phpcs:disable WordPress.Files.FileName.NotHyphenatedLowercase

/**
 * Custom Sensors for the LearnPress plugin.
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
        // courses and lessons
        add_action( 'learnpress/user/course-enrolled', array( $this, 'LogCourseEnroll' ), 10, 3 );
        add_action( 'learn-press/user-completed-lesson', array( $this, 'LogLessonComplete' ), 10, 3 );
        add_action( 'learn-press/user-course-finished', array( $this, 'LogCourseFinished' ), 10, 3 );

        // quizzes
        add_action( 'learn-press/user/quiz-started', array( $this, 'LogQuizStarted' ), 10, 3 );
        add_action( 'learn-press/user/quiz-finished', array( $this, 'LogQuizFinished' ), 10, 3 );
        add_action( 'learn-press/user/quiz-retried', array( $this, 'LogQuizRetried' ), 10, 3 );
    }

    /**
     * Log user enrollment to LearnPress courses
     */
    public function LogCourseEnroll( $order_id, $course_id, $user_id ) {
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
    public function LogLessonComplete( $lesson_id, $course_id, $user_id ) {
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
    public function LogCourseFinished( $course_id, $user_id, $return_status ) {
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
    private function LogQuizEvent( $alert_code, $quiz_id, $course_id, $user_id ) {
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
    public function LogQuizStarted( ...$args ) {
        $this->LogQuizEvent( 1010003, ...$args );
    }

    /**
     * Log users starting a quiz in LearnPress course
     */
    public function LogQuizFinished( ...$args ) {
        $this->LogQuizEvent( 1010004, ...$args );
    }

    /**
     * Log users starting a quiz in LearnPress course
     */
    public function LogQuizRetried( ...$args ) {
        $this->LogQuizEvent( 1010005, ...$args );
    }
}
