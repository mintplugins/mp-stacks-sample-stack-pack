<?php
/**
 * This file contains the function keeps the MP Stacks Sample Stack Pack plugin up to date.
 *
 * @since 1.0.0
 *
 * @package    MP Stacks Sample Stack Pack
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2014, Move Plugins
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author     Philip Johnston
 */
 
/**
 * Check for updates for the MP Stacks Sample Stack Pack Plugin by creating a new instance of the MP_CORE_Plugin_Updater class.
 *
 * @access   public
 * @since    1.0.0
 * @return   void
 */
 if (!function_exists('mp_stacks_sample_stack_pack_update')){
	function mp_stacks_sample_stack_pack_update() {
		
		$args = array(
			'software_name' => 'MP Stacks + Sample Stack Pack', //<- The exact name of this Plugin. Make sure it matches the title in your mp_stacks-sample_template, sample_template, and the WP.org stacks-sample_template
			'software_api_url' => 'http://moveplugins.com',//The URL where Sample Template and mp_stacks-sample_template are installed and checked
			'software_filename' => 'mp-stacks-sample-stack-pack.php',
			'software_licensed' => true, //<-Boolean
		);
		
		//Since this is a plugin, call the Plugin Updater class
		$mp_stacks_sample_stack_pack_plugin_updater = new MP_CORE_Plugin_Updater($args);
	}
 }
add_action( 'admin_init', 'mp_stacks_sample_stack_pack_update' );
