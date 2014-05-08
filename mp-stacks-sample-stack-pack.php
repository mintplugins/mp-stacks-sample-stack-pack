<?php
/*
Plugin Name: MP Stacks + Sample Stack Pack
Plugin URI: http://moveplugins.com
Description: This is a sample Stack Template Plugin
Version: 1.0.0.0
Author: Move Plugins
Author URI: http://moveplugins.com
Text Domain: mp_stacks_sample_stack_pack
Domain Path: languages
License: GPL2
*/

/*  Copyright 2014  Phil Johnston  (email : phil@moveplugins.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Move Plugins Core.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Move Plugins Core, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*
|--------------------------------------------------------------------------
| CONSTANTS
|--------------------------------------------------------------------------
*/
// Plugin version
if( !defined( 'MP_STACKS_SAMPLE_STACK_PACK_VERSION' ) )
	define( 'MP_STACKS_SAMPLE_STACK_PACK_VERSION', '1.0.0.0' );

// Plugin Folder URL
if( !defined( 'MP_STACKS_SAMPLE_STACK_PACK_PLUGIN_URL' ) )
	define( 'MP_STACKS_SAMPLE_STACK_PACK_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Plugin Folder Path
if( !defined( 'MP_STACKS_SAMPLE_STACK_PACK_PLUGIN_DIR' ) )
	define( 'MP_STACKS_SAMPLE_STACK_PACK_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Plugin Root File
if( !defined( 'MP_STACKS_SAMPLE_STACK_PACK_PLUGIN_FILE' ) )
	define( 'MP_STACKS_SAMPLE_STACK_PACK_PLUGIN_FILE', __FILE__ );

/*
|--------------------------------------------------------------------------
| GLOBALS
|--------------------------------------------------------------------------
*/



/*
|--------------------------------------------------------------------------
| INTERNATIONALIZATION
|--------------------------------------------------------------------------
*/

function mp_stacks_sample_stack_pack_textdomain() {

	// Set filter for plugin's languages directory
	$mp_stacks_sample_stack_pack_lang_dir = dirname( plugin_basename( MP_STACKS_SAMPLE_STACK_PACK_PLUGIN_FILE ) ) . '/languages/';
	$mp_stacks_sample_stack_pack_lang_dir = apply_filters( 'mp_stacks_sample_stack_pack_languages_directory', $mp_stacks_sample_stack_pack_lang_dir );


	// Traditional WordPress plugin locale filter
	$locale        = apply_filters( 'plugin_locale',  get_locale(), 'mp-stacks-sample-stack-pack' );
	$mofile        = sprintf( '%1$s-%2$s.mo', 'mp-stacks-sample-stack-pack', $locale );

	// Setup paths to current locale file
	$mofile_local  = $mp_stacks_sample_stack_pack_lang_dir . $mofile;
	$mofile_global = WP_LANG_DIR . '/mp-stacks-sample-stack-pack/' . $mofile;

	if ( file_exists( $mofile_global ) ) {
		// Look in global /wp-content/languages/mp_stacks_sample_stack_pack folder
		load_textdomain( 'mp_stacks_sample_stack_pack', $mofile_global );
	} elseif ( file_exists( $mofile_local ) ) {
		// Look in local /wp-content/plugins/message_bar/languages/ folder
		load_textdomain( 'mp_stacks_sample_stack_pack', $mofile_local );
	} else {
		// Load the default language files
		load_plugin_textdomain( 'mp_stacks_sample_stack_pack', false, $mp_stacks_sample_stack_pack_lang_dir );
	}

}
add_action( 'init', 'mp_stacks_sample_stack_pack_textdomain', 1 );

/*
|--------------------------------------------------------------------------
| INCLUDES
|--------------------------------------------------------------------------
*/

function mp_stacks_sample_stack_pack_include_files(){
	
	//Check the validity of the license for this plugin (boolean)
	$plugin_vars = array(
		'plugin_name' => 'MP Stacks + Sample Stack Pack',
		'plugin_api_url' => 'https://moveplugins.com/repo/mp-stacks-sample-stack-pack',
	);	
	
	$license_key_valid = mp_core_listen_for_license_and_get_validity( $plugin_vars );
		
	/**
	 * If mp_core isn't active, stop and install it now
	 */
	if (!function_exists('mp_core_textdomain')){
		
		/**
		 * Include Plugin Checker
		 */
		require( MP_STACKS_SAMPLE_STACK_PACK_PLUGIN_DIR . '/includes/plugin-checker/class-plugin-checker.php' );
		
		/**
		 * Include Plugin Installer
		 */
		require( MP_STACKS_SAMPLE_STACK_PACK_PLUGIN_DIR . '/includes/plugin-checker/class-plugin-installer.php' );
		
		/**
		 * Check if mp_core in installed
		 */
		include_once( MP_STACKS_SAMPLE_STACK_PACK_PLUGIN_DIR . 'includes/plugin-checker/included-plugins/mp-core-check.php' );
		
	}
	//If we don't have a valid license
	elseif( $license_key_valid != true ){
	
		/**
		 * Show license form at the top of admin pages
		 */
		include_once( MP_STACKS_SAMPLE_STACK_PACK_PLUGIN_DIR . 'includes/misc-functions/license-form.php' );
		
			
	}
	//If MP Stacks or Knapstack aren't installed
	elseif( !function_exists('mp_stacks_textdomain') || !function_exists('mp_knapstack_textdomain') ) {
		
		/**
		 * Check if mp-stacks in installed
		 */
		include_once( MP_STACKS_SAMPLE_STACK_PACK_PLUGIN_DIR . 'includes/plugin-checker/included-plugins/mp-stacks-check.php' );
		
		/**
		 * Check if mp-knapstack in installed
		 */
		include_once( MP_STACKS_SAMPLE_STACK_PACK_PLUGIN_DIR . 'includes/plugin-checker/included-plugins/mp-knapstack-check.php' );
		
	}
	/**
	 * Otherwise, if license passes and all required plugins are installed, carry out the plugin's functions
	 */
	else{
			
		/**
		 * Update script - keeps this plugin up to date
		 */
		require( MP_STACKS_SAMPLE_STACK_PACK_PLUGIN_DIR . 'includes/updater/mp-stacks-sample-stack-pack-update.php' );
		
		/**
		 *  Sample Template 1
		 */
		//require( mp-stacks-sample-stack-pack_PLUGIN_DIR . 'includes/stack-templates/brand-spankin-new/brand-spankin-new.php' );
		
		/**
		 *  Sample Template 1
		 */
		require( MP_STACKS_SAMPLE_STACK_PACK_PLUGIN_DIR . 'includes/stack-templates/my-fun-stack/my-fun-stack.php' );
		
	}
}
add_action('after_setup_theme', 'mp_stacks_sample_stack_pack_include_files', 9);