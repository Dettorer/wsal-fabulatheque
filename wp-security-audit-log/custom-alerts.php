<?php
/**
 * Our list of events.
 *
 * @package wsal
 */

// phpcs:disable WordPress.WP.I18n.UnorderedPlaceholdersText 
// phpcs:disable WordPress.WP.I18n.MissingTranslatorsComment

$custom_alerts = array(
    __('LearnPress Events', 'wsal-fabulatheque') => array(
        __('Courses', 'wsal-fabulatheque') => array(
            array(
                1010000,
                E_NOTICE,
                __('User enrolled in a course', 'wsal-fabulatheque'),
                __('%CustomAlertText%', 'wsal-fabulatheque')
            ),
        )
    )
);
