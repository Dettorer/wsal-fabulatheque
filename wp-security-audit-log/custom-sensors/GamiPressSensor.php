<?php // phpcs:disable WordPress.Files.FileName.NotHyphenatedLowercase

/**
 * Custom Sensors for the GamiPress plugin.
 *
 * Class file for alert manager.
 *
 * @since   1.0.0
 * @package wsal
 * @subpackage wsal-fabulatheque
 */
class WSAL_Sensors_GamiPressSensor extends WSAL_AbstractSensor {

    /**
     * Hook events related to the sensor.
     */
    public function HookEvents() {
        // Points
        add_action( 'gamipress_award_points_to_user', array( $this, 'LogPointsAwarded' ), 10, 4 );
        add_action( 'gamipress_deduct_points_to_user', array( $this, 'LogPointsDeducted' ), 10, 4 );

        // Ranks
        add_action( 'gamipress_award_rank_to_user', array( $this, 'LogRankAwarded' ), 10, 3 );
        add_action( 'gamipress_revoke_rank_to_user', array( $this, 'LogRankRevoked' ), 10, 4 );
        add_action( 'gamipress_update_user_rank', array( $this, 'LogRankUpdated' ), 10, 5 );

        // Achievements
        add_action( 'gamipress_award_achievement', array( $this, 'LogAchievementAwarded' ), 10, 5 );
        add_action( 'gamipress_revoke_achievement_to_user', array( $this, 'LogAchievementRevoked' ), 10, 3 );
    }

    /**
     * Log a GamiPress points-related event
     */
    private function LogPointsEvent( $alert_code, $user_id, $points, $points_type, $extra_info ) {
        // Very important: these variable will also show up in the wsal_metadata
        // database table.
        $variables = array(
            'UserId' => esc_html( $user_id ),
            'PointsCount' => esc_html( $course_id ),
            'PointsType' => esc_html( $quiz_id ),
            'Reason' => esc_html( $extra_info['reason'] ),
            'RelatedAchievement' => esc_html( $extra_info['achievement_id'] ),
        );

        $this->plugin->alerts->Trigger( $alert_code, $variables );
    }

    /**
     * Log users being awarded some GamiPress points
     */
    public function LogPointsAwarded( ...$args ) {
        $this->LogPointsEvent( 1020000, ...$args );
    }

    /**
     * Log users being deducted some GamiPress points
     */
    public function LogPointsDeducted( ...$args ) {
        $this->LogPointsEvent( 1020001, ...$args );
    }

    /**
     * Log users being awarded a GamiPress rank
     */
    public function LogRankAwarded( $user_id, $rank_id, $extra_info ) {
        // Very important: these variable will also show up in the wsal_metadata
        // database table.
        $variables = array(
            'UserId' => esc_html( $user_id ),
            'RankId' => esc_html( $rank_id ),
            'RelatedAchievement' => esc_html( $extra_info['achievement_id'] ),
        );

        $this->plugin->alerts->Trigger( 1020002, $variables );
    }

    /**
     * Log users having a GamiPress rank revoked
     */
    public function LogRankRevoked( $user_id, $rank_id, $new_rank_id, $extra_info ) {
        // Very important: these variable will also show up in the wsal_metadata
        // database table.
        $variables = array(
            'UserId' => esc_html( $user_id ),
            'RankId' => esc_html( $rank_id ),
            'NewRankId' => esc_html( $new_rank_id ),
            'RelatedAchievement' => esc_html( $extra_info['achievement_id'] ),
        );

        $this->plugin->alerts->Trigger( 1020003, $variables );
    }

    /**
     * Log users having their GamiPress rank updated
     */
    public function LogRankUpdated( $user_id, $new_rank, $old_rank, $admin_id, $achievement_id ) {
        // Very important: these variable will also show up in the wsal_metadata
        // database table.
        $variables = array(
            'UserId' => esc_html( $user_id ),
            'OldRank' => esc_html( $old_rank ),
            'NewRank' => esc_html( $new_rank ),
            'RelatedAchievement' => esc_html( $extra_info['achievement_id'] ),
        );

        $this->plugin->alerts->Trigger( 1020006, $variables );
    }

    /**
     * Log users being awarded a GamiPress achievement
     */
    public function LogAchievementAwarded( $user_id, $achievement_id, $trigger, $site_id, $extra_info ) {
        // Very important: these variable will also show up in the wsal_metadata
        // database table.
        $variables = array(
            'UserId' => esc_html( $user_id ),
            'AchievementId' => esc_html( $achievement_id ),
        );

        $this->plugin->alerts->Trigger( 1020004, $variables );
    }

    /**
     * Log users having a GamiPress achievement revoked
     */
    public function LogAchievementRevoked( $user_id, $achievement_id, $earning_id ) {
        // Very important: these variable will also show up in the wsal_metadata
        // database table.
        $variables = array(
            'UserId' => esc_html( $user_id ),
            'AchievementId' => esc_html( $achievement_id ),
            'EarningId' => esc_html( $earning_id ),
        );

        $this->plugin->alerts->Trigger( 1020005, $variables );
    }
}
