<?php
/**
 * This file contains a function which checks if the MP Stacks + Embed Tweets plugin is installed.
 *
 * @since 1.0.0
 *
 * @package    MP Core + Embed Tweets
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2014, Move Plugins
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author     Philip Johnston
 */
 
/**
* Check to make sure the MP Stacks + Embed Tweets Plugin is installed.
*
* @since    1.0.0
* @link     http://moveplugins.com/doc/plugin-checker-class/
* @return   array $plugins An array of plugins to be installed. This is passed in through the mp_core_check_plugins filter.
* @return   array $plugins An array of plugins to be installed. This is passed to the mp_core_check_plugins filter. (see link).
*/
if (!function_exists('mp_stacks_embed_tweets_plugin_check')){
	function mp_stacks_embed_tweets_plugin_check( $plugins ) {
		
		$add_plugins = array(
			array(
				'plugin_name' => 'MP Stacks + Embed Tweets',
				'plugin_message' => __('You require the MP Stacks + Embed Tweets plugin. Install it here.', 'mp_stacks_embed_tweets'),
				'plugin_filename' => 'mp-stacks-embed-tweets.php',
				'plugin_download_link' => 'http://moveplugins.com/repo/mp-stacks-embed-tweets/?downloadfile=true',
				'plugin_api_url' => 'https://moveplugins.com/',
				'plugin_info_link' => 'http://moveplugins.com/plugins/mp-stacks',
				'plugin_group_install' => true,
				'plugin_licensed' => false,
				'plugin_required' => true,
				'plugin_wp_repo' => false,
			)
		);
		
		return array_merge( $plugins, $add_plugins );
	}
}
add_filter( 'mp_core_check_plugins', 'mp_stacks_embed_tweets_plugin_check' );