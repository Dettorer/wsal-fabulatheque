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
        add_action( 'learn-press/after-enroll-form', array( $this, 'LogLessonComplete' ) );
    }

    /**
     * A custom logging function. Logs a custom event with code 4444
     */
    public function LogLessonComplete() {
        $alert_code = 1010000;
        $alert_text = __( 'This is the custom text', 'wp-fabulatheque' );
        $variables = array(
            'CustomAlertText' => $alert_text,
        );

        $this->plugin->alerts->Trigger( $alert_code, $variables );
    }
}
