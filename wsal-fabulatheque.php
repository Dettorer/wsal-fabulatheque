<?php
/**
 * Plugin Name: WP Activity Log for Fabulatheque
 * Plugin URI: https://github.com/Dettorer/wsal-fabulatheque
 * Description: A WP Activity Log plugin extension for the Fabulatheque needs not already covered by another WP Activity Log extension
 * Text Domain: wsal-fabulatheque
 * Author: Paul Hervot
 * Author URI: https://github.com/Dettorer
 * Version: 1.1.1
 * License: GPL2
 * Network: true
 *
 * @package Wsal
 * @subpackage Wsal Custom Events Loader
 */

/*
    Copyright(c) 2022  Paul Hervot

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*
 REQUIRED. Here we include and fire up the main core class. This will be needed regardless so be sure to leave line 37-39 in tact.
*/
require_once plugin_dir_path( __FILE__ ) . 'core/class-extension-core.php';
$wsal_extension = new WPWhiteSecurity\ActivityLog\Extensions\Common\Core( __FILE__, 'wsal-fabulatheque' );

/*
    From here, you may now place your custom code. Examples of the functions
    needed in a typical extension are provided as a basis, however you MUST
    rename the functions (make them unique) to avoid duplication conflicts.

    Each function provide is complete with internal workings, simply uncomment
    and edit as you wish.
*/

/**
 * Register a custom event object within WSAL.
 *
 * @param array $objects array of objects currently registered within WSAL.
 */
function wsal_fabulatheque_core_add_custom_event_objects( $objects ) {
    $new_objects = array(
        'fabulatheque' => esc_html__('Fabulatheque', 'wsal-fabulatheque' ),
    );

    // combine the two arrays.
    $objects = array_merge( $objects, $new_objects );

    return $objects;
}

/**
 * Add a custom post type to the ignored list.
 * If your plugin uses a CPT, you may wish to ensure WSAL does not treat
 * the post as a regular post (reporting updates, creation etc). Use your
 * CPTs slug to add it to the list of "igored post types".
 *
 * @param array $post_types Current list of post types to ignore.
 */
// function wsal_fabulatheque_core_add_custom_ignored_cpt( $post_types ) {
    // $new_post_types = array(
    // 'my_cpt_slug',    // Your custom post types slug.
    // );
    //
    // // combine the two arrays.
    // $post_types = array_merge( $post_types, $new_post_types );
    //
    // return $post_types;
// }

/**
 * Add our own meta formatter. If you wish to create your own custom variable to be
 * used within your custom event message etc, you can register the variable here as well
 * as specify how to handle it.
 *
 * @param string $value Value of variable.
 * @param string $name  Variable name we wish to change.
 */
// function wsal_fabulatheque_core_add_custom_meta_format( $value, $name ) {
    // $check_value = (string) $value;
    // if ( '%MyCustomVariable%' === $name ) {
    // if ( 'NULL' !== $check_value ) {
    // return '<a target="_blank" href="' . esc_url( $value ) . '">' . __( 'View form in the editor', 'wp-security-audit-log' ) . '</a>';
    // }
    // return $value;
    // }
    //
    // return $value;
// }

/*
    Filter in our custom functions into WSAL.
 */
add_filter( 'wsal_event_objects', 'wsal_fabulatheque_core_add_custom_event_objects', 10, 2 );
// add_filter( 'wsal_meta_formatter_custom_formatter', 'wsal_fabulatheque_core_add_custom_meta_format', 10, 2 );
