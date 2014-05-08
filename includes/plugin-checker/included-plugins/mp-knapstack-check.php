<?php
/**
 * This file contains a function which checks if the KnapStack Theme is installed.
 *
 * @since 1.0.0
 *
 * @package    MP Core + Features
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2014, Move Plugins
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author     Philip Johnston
 */
 
/**
* Check to make sure the KnapStack Theme is installed.
*
* @since    1.0.0
* @link     http://moveplugins.com/doc/plugin-checker-class/
* @return   array $plugins An array of plugins to be installed. This is passed in through the mp_core_check_plugins filter.
* @return   array $plugins An array of plugins to be installed. This is passed to the mp_core_check_plugins filter. (see link).
*/
if (!function_exists('mp_knapstack_plugin_check')){
	function mp_knapstack_plugin_check( $plugins ) {
		
		$add_plugins = array(
			array(
				'plugin_name' => 'KnapStack Theme',
				'plugin_message' => __('You require the KnapStack Theme. Install it here.', 'mp_knapstack'),
				'plugin_filename' => '',
				'plugin_download_link' => 'http://moveplugins.com/repo/knapstack-theme/?downloadfile=true',
				'plugin_api_url' => 'https://moveplugins.com/',
				'plugin_info_link' => 'http://moveplugins.com/knapstack-theme',
				'plugin_group_install' => true,
				'plugin_licensed' => true,
				'plugin_licensed_parent_name' => 'MP Stacks + Sample Stack Pack',
				'plugin_required' => true,
				'plugin_wp_repo' => true,
				'plugin_is_theme' => true,
			)
		);
		
		return array_merge( $plugins, $add_plugins );
	}
}
add_filter( 'mp_core_check_plugins', 'mp_knapstack_plugin_check' );