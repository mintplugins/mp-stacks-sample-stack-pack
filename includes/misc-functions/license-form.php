<?php

/**
 * Create License Input Form in the admin notices area for this plugin
 *
 * @since    1.0.0
 * @return   void
 */
function mp_stacks_sample_stack_pack_show_license_form_in_notices(){
	
	$plugin_name = 'MP Stacks Sample Stack Pack';
	$plugin_name_slug = 'mp-stacks-sample-stack-pack';
	$license_key = get_option( 'mp-stacks-sample-stack-pack_license_key' );
	$get_license_link = NULL;
	
?>
<div id="<?php echo $plugin_name_slug; ?>-plugin-license-wrap" class="error wrap mp-core-plugin-license-wrap">
	
	<p class="plugin-description"><?php echo __( "Enter your license for ", 'mp_core' ) . $plugin_name; ?></p>
	
	<form method="post">
        			
		<input style="float:left; margin-right:10px;" id="<?php echo $plugin_name_slug; ?>_license_key" name="<?php echo $plugin_name_slug; ?>_license_key" type="text" class="regular-text" value="<?php esc_attr_e( $license_key ); ?>" />		
       
        <?php echo mp_core_true_false_light( array( 'value' => false, 'description' => __('This license is not valid! ', 'mp_core') . $get_license_link ) ); ?>
		
		<?php wp_nonce_field( $plugin_name_slug . '_nonce', $plugin_name_slug . '_nonce' ); ?>
		
        <div class="mp-core-clearedfix"></div>
        
		<?php submit_button(__('Submit License', 'mp_core') ); ?>
	
	</form>
</div>

<?php
}
add_action( 'admin_notices', 'mp_stacks_sample_stack_pack_show_license_form_in_notices' );