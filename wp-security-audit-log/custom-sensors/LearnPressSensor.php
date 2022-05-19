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
        // fires when a new post_tag is created.
        add_action( 'learnpress/user/course-enrolled', array( $this, 'LogLessonEnroll' ), 10, 3 );
    }

    /**
     * Log user enrollment to LearnPress courses
     */
    public function LogLessonEnroll( $order_id, $course_id, $user_id ) {
        $alert_code = 1010000;

        // Very important: these variable will also show up in the wsal_metadata
        // database table.
        $variables = array(
            'UserId' => esc_html( $user_id ),
            'CourseId' => esc_html( $course_id ),
        );
        // TODO: find a way to show the course name

        $this->plugin->alerts->Trigger( $alert_code, $variables );
    }
}
