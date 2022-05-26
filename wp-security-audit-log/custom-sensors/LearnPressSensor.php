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
}
