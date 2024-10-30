<?php
/*
Plugin Name: IT Popups
Plugin URI:  http://tartantraffic.com/it-popup/plugin-info/
Description: This is a plugin to show the content including shortcode in popup. You can also add footer in the popup. Popup will open by clicking any link, image or label.
Author: Awais Altaf
Author URI: http://tartantraffic.com/it-popup
Version: 1.0
Text Domain: it_modal_popup
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
/*
IT Popups is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
IT Popups is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with IT Popups. If not, see http://www.gnu.org/licenses/gpl-2.0.html.
*/

/* Register Settings with Section */
add_action( 'admin_init', 'itpopup_modal_init_settings' );
function itpopup_modal_init_settings(){
	/* Register General Settings */
	register_setting( 'it_modal_popup', 'itpopup_option_name' );

	/* Register Body Setting */
	register_setting( 'it_modal_popup', 'itpopup_option_body' );

	// register a new section in the "wporg" page
	 add_settings_section(
		 'itpopup_section_developers',
		 __( 'IT PopUp Box Settings', 'it_modal_popup' ),  /* WordPress Function To Translate String  */
		 'itpopup_section_developers_callback_function',
		 'it_modal_popup'
	 );

	 
	
	 /* Title Field */
	 add_settings_field(
		 'itpopup_field_title', 
		 __( 'Header Title', 'it_modal_popup' ),  
		 'itpopup_title_field_callback_function',
		 'it_modal_popup',
		 'itpopup_section_developers',
		 [
		 'label_for' => 'itpopup_field_title',
		 'class' => 'itpop_row_title',
		 ]
	 );

	 
	/* Title Color Field */
	 add_settings_field(
		 'itpopup_field_title_color', 
		 __( 'Title Color', 'it_modal_popup' ),
		 'itpopup_title_color_field_callback_function',
		 'it_modal_popup',
		 'itpopup_section_developers',
		 [
		 'label_for' => 'itpopup_field_title_color',
		 'class' => 'itpop_row_title_color',
		 ]
	 );

	 /* Title Background Color Field */
	 add_settings_field(
		 'itpopup_field_title_bgcolor', 
		 __( 'Header Background', 'it_modal_popup' ),
		 'itpopup_title_bgcolor_field_callback_function',
		 'it_modal_popup',
		 'itpopup_section_developers',
		 [
		 'label_for' => 'itpopup_field_title_bgcolor',
		 'class' => 'itpop_row_title_bgcolor',
		 ]
	 );


	 /* Width Field */
	 add_settings_field(
		 'itpopup_field_width', 
		 __( 'Width', 'it_modal_popup' ),
		 'itpopup_width_field_callback_function',
		 'it_modal_popup',
		 'itpopup_section_developers',
		 [
		 'label_for' => 'itpopup_field_width',
		 'class' => 'itpop_row_width',
		 ]
	 );
	 
	 /* Height Field */
	 add_settings_field(
		 'itpopup_field_height', 
		 __( 'Height', 'it_modal_popup' ),
		 'itpopup_height_field_callback_function',
		 'it_modal_popup',
		 'itpopup_section_developers',
		 [
		 'label_for' => 'itpopup_field_height',
		 'class' => 'itpop_row_height',
		 ]
	 );

	 /* Display On Load Checkbox */
	 add_settings_field(
		 'itpopup_display_on_load', 
		 __( 'Display On Page Load', 'it_modal_popup' ),
		 'itpopup_display_on_load_callback_function',
		 'it_modal_popup',
		 'itpopup_section_developers',
		 [
		 'label_for' => 'itpopup_display_on_load',
		 'class' => 'itpop_row_display_on_load',
		 ]
	 );

	 /* Display Only Once Checkbox */
	 add_settings_field(
		 'itpopup_display_only_once', 
		 __( 'Display Only Once', 'it_modal_popup' ),
		 'itpopup_display_only_once_callback_function',
		 'it_modal_popup',
		 'itpopup_section_developers',
		 [
		 'label_for' => 'itpopup_display_only_once',
		 'class' => 'itpop_row_display_only_once',
		 ]
	 );

	 /* Display On Front Page Only Checkbox */
	 add_settings_field(
		 'itpopup_display_on_front_page', 
		 __( 'Display On Front Page Only', 'it_modal_popup' ),
		 'itpopup_display_front_page_callback_function',
		 'it_modal_popup',
		 'itpopup_section_developers',
		 [
		 'label_for' => 'itpopup_display_on_front_page',
		 'class' => 'itpop_row_display_on_front_page',
		 ]
	 );

	 /* Restrict Display On Post ID */
	 add_settings_field(
		 'itpopup_restrict_posts_select', 
		 __( "Don't Display Popup On Following Post/Page ID's", 'it_modal_popup' ),
		 'itpopup_restrict_posts_select_callback_function',
		 'it_modal_popup',
		 'itpopup_section_developers',
		 [
		 'label_for' => 'itpopup_restrict_posts_select',
		 'class' => 'itpop_row_restrict_posts_select',
		 ]
	 );


	 /* Footer Checkbox Field */
	 add_settings_field(
		 'itpopup_checkbox_ft', 
		 __( 'Display Footer', 'it_modal_popup' ),
		 'itpopup_ft_checkbox_callback_function',
		 'it_modal_popup',
		 'itpopup_section_developers',
		 [
		 'label_for' => 'itpopup_checkbox_ft',
		 'class' => 'itpopup_row_checkbox_ft',
		 ]
	 );

	 /* Footer Text Field */
	 add_settings_field(
		 'itpopup_field_ft_text', 
		 __( 'Footer Text', 'it_modal_popup' ),
		 'itpopup_ft_text_field_callback_function',
		 'it_modal_popup',
		 'itpopup_section_developers',
		 [
		 'label_for' => 'itpopup_field_ft_text',
		 'class' => 'itpopup_row_ft_text',
		 ]
	 );

	 
	 /* Footer Title Color Field */
	 add_settings_field(
		 'itpopup_field_ft_title_color', 
		 __( 'Footer Title Color', 'it_modal_popup' ),
		 'itpopup_ft_text_color_field_callback_function',
		 'it_modal_popup',
		 'itpopup_section_developers',
		 [
		 'label_for' => 'itpopup_field_ft_title_color',
		 'class' => 'itpopup_row_ft_title_color',
		 ]
	 );

	 /* Footer Background Color Field */
	 add_settings_field(
		 'itpopup_field_ft_text_bg', 
		 __( 'Footer Background', 'it_modal_popup' ),
		 'itpopup_ft_text_bg_field_callback_function',
		 'it_modal_popup',
		 'itpopup_section_developers',
		 [
		 'label_for' => 'itpopup_field_ft_text_bg',
		 'class' => 'itpopup_row_ft_text_bg',
		 ]
	 );

	 /* Button Text Field */
	 add_settings_field(
		 'itpopup_field_button_text', 
		 __( 'Popup Label/Link/Image', 'it_modal_popup' ),
		 'itpopup_button_text_field_callback_function',
		 'it_modal_popup',
		 'itpopup_section_developers',
		 [
		 'label_for' => 'itpopup_field_button_text',
		 'class' => 'itpopup_row_button_text',
		 ]
	 );


	 /* Popup Body Field */
	 add_settings_field(
		 'itpopup_field_body', 
		 __( 'Pop Up Body', 'it_modal_popup' ),
		 'itpopup_body_field_callback_function',
		 'it_modal_popup',
		 'itpopup_section_developers',
		 [
		 'label_for' => 'itpopup_field_body',
		 'class' => 'itpop_row_body',
		 ]
	 );

}



/* Settings Section Callback function */
function itpopup_section_developers_callback_function( $args ){
?>	<!-- Setting Section -->
	<!-- Use Details -->
	<div class="it-popup-notice-block">
		<?php 	echo '<span class="it-popup-notice">Dear user, kindly paste <b>'. htmlspecialchars("<?php echo itpopup_show_modal_front(); ?>") . '</b> in your template where you want to display the popup.</span><br>'; ?>
		<?php 	echo '<span class="it-popup-notice">Dear user, kindly paste <b>'. htmlspecialchars("[IT_MODAL_POPUP]") . '</b> in your post, page or any editor where you want to display the popup.</span>'; ?>
	</div>
	<h3 id="<?php echo esc_attr( $args['id'] ); ?>"><?php _e('Select Popup Details','it_modal_popup'); ?></h3>
<?php
}

/* Settings Display On Load Callback function */
function itpopup_display_on_load_callback_function( $args ){
	$it_popup_options = get_option( 'itpopup_option_name' );
?>
	<input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="itpopup_option_name[<?php echo esc_attr($args['label_for']); ?>]" 
	value="1" <?php checked($it_popup_options[esc_attr($args['label_for'])], 1); ?>  />
	<label for="itpopup_option_name[<?php echo esc_attr($args['label_for']); ?>]"><?php _e('Please check if you want to display popup on site load','it_modal_popup'); ?></label><?php
}

function itpopup_display_only_once_callback_function( $args ){
	$it_popup_options = get_option( 'itpopup_option_name' );
?>
	<input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="itpopup_option_name[<?php echo esc_attr($args['label_for']); ?>]" 
	value="1" <?php checked($it_popup_options[esc_attr($args['label_for'])], 1); ?>  />
	<label for="itpopup_option_name[<?php echo esc_attr($args['label_for']); ?>]"><?php _e('Please check if you want to display popup only once on site load','it_modal_popup'); ?></label><?php
}

/* Settings Display On Front Page Only Callback function */
function itpopup_display_front_page_callback_function( $args ){
	$it_popup_options = get_option( 'itpopup_option_name' );
?>
	<input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="itpopup_option_name[<?php echo esc_attr($args['label_for']); ?>]" 
	value="1" <?php checked($it_popup_options[esc_attr($args['label_for'])], 1); ?>  />
	<label for="itpopup_option_name[<?php echo esc_attr($args['label_for']); ?>]"><?php _e('Please check if you want to display popup on front page only','it_modal_popup'); ?></label><?php
}

/* Settings Restrict Posts Popup Display function */
function itpopup_restrict_posts_select_callback_function( $args ){
	$it_popup_options = get_option( 'itpopup_option_name' );
	$post_ids_val = str_replace(' ', '', $it_popup_options[$args['label_for']]); // Remove Empty Spaces
?>	<!-- Required Field -->
	<input class="regular-text check_title_field" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="itpopup_option_name[<?php echo esc_attr($args['label_for']); ?>]" 
	value="<?php echo !empty($post_ids_val) ?( esc_attr($post_ids_val) ):('') ;?>"/>
	<p class="description_field"><?php _e("Put the Post ID's where you don't want to display onload popup, write with comma separated for example 22,30,40 ",'it_modal_popup'); ?></p>
<?php
}

/* Settings Width Field Callback function */
function itpopup_title_field_callback_function( $args ){
	$it_popup_options = get_option( 'itpopup_option_name' );
?>	<!-- Required Field -->
	<input required class="regular-text check_title_field" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="itpopup_option_name[<?php echo esc_attr($args['label_for']); ?>]" 
	value="<?php echo !empty($it_popup_options[esc_attr($args['label_for'])]) ?( esc_attr(strip_tags($it_popup_options[$args['label_for']])) ):('') ;?>"/>
	<p class="description_field"><?php _e('Put the title here','it_modal_popup'); ?></p>
<?php
}

/* Settings Title Color Field Callback function */
function itpopup_title_color_field_callback_function( $args ){
	$it_popup_options = get_option( 'itpopup_option_name' );
?>
	<input class="color" type="text" name="itpopup_option_name[<?php echo esc_attr($args['label_for']); ?>]" id="pop_bordercolor" 
	value="<?php echo !empty($it_popup_options[esc_attr($args['label_for'])]) ?( esc_attr($it_popup_options[$args['label_for']]) ):('#000000') ;?>" maxlength="7" />
	<p class="description_field"><?php _e('Select your popup window title color. (Ex: #4D4D4D)','it_modal_popup'); ?></p>
<?php
}

/* Settings Title Background Color Field Callback function */
function itpopup_title_bgcolor_field_callback_function( $args ){
	$it_popup_options = get_option( 'itpopup_option_name' );
?>
	<input class="color" type="text" name="itpopup_option_name[<?php echo esc_attr($args['label_for']); ?>]" id="pop_bordercolor" 
	value="<?php echo !empty($it_popup_options[esc_attr($args['label_for'])]) ?( esc_attr($it_popup_options[$args['label_for']]) ):('#00ff59') ;?>" maxlength="7" />
	<p class="description_field"><?php _e('Select your popup window header background color. (Ex: #4D4D4D)','it_modal_popup') ?></p>
<?php
}

/* Settings Button Text Field Callback function */
function itpopup_button_text_field_callback_function( $args ){
	$it_popup_options = get_option( 'itpopup_option_name' );
?>  <!-- Required Field -->
	<input required size="100" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="itpopup_option_name[<?php echo esc_attr($args['label_for']); ?>]" 
	value="<?php echo !empty($it_popup_options[esc_attr($args['label_for'])]) ?( esc_attr($it_popup_options[$args['label_for']])):(''); ?>"/>
	<p class="description_field"><?php _e('Put your button label/image/link.','it_modal_popup'); ?></p>
<?php
}

/* Settings Width Field Callback function */
function itpopup_width_field_callback_function( $args ){
	$it_popup_options = get_option( 'itpopup_option_name' );
?>
	<input type="text" size="20" class="regular-text" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="itpopup_option_name[<?php echo esc_attr($args['label_for']); ?>]" 
	value="<?php echo !empty($it_popup_options[esc_attr($args['label_for'])]) ?( esc_attr($it_popup_options[$args['label_for']]) ):('750') ;?>" maxlength="3" />
	<p class="description_field"><?php _e('Put your popup window width (Ex: 750). Width will be in px. Default value is (80%).','it_modal_popup'); ?></p>
<?php
}

/* Settings Height Field Callback function */
function itpopup_height_field_callback_function( $args ){
	$it_popup_options = get_option( 'itpopup_option_name' );
?>
	<input type="text" size="20" class="regular-text" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="itpopup_option_name[<?php echo esc_attr($args['label_for']); ?>]" 
	 value="<?php echo !empty($it_popup_options[esc_attr($args['label_for'])]) ?( esc_attr($it_popup_options[$args['label_for']]) ):('') ;?>" maxlength="3"  />
	 <p class="description_field"><?php _e('Put your popup window height (Ex: 300). Height will be in px. Default value is (auto).','it_modal_popup'); ?></p>
<?php
}

/* Settings Footer Display Checkbox Callback function */
function itpopup_ft_checkbox_callback_function( $args ){
	$it_popup_options = get_option( 'itpopup_option_name' );
?>
	<input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="itpopup_option_name[<?php echo esc_attr($args['label_for']); ?>]" 
	value="1" <?php checked($it_popup_options[esc_attr($args['label_for'])], 1); ?>  />
	<label for="itpopup_option_name[<?php echo esc_attr($args['label_for']); ?>]"><?php _e('Please check if you want to display footer','it_modal_popup'); ?></label><?php
}

/* Settings Footer Text Callback function */
function itpopup_ft_text_field_callback_function( $args ){
	$it_popup_options = get_option( 'itpopup_option_name' );
?>
	<input <?php if($it_popup_options['itpopup_checkbox_ft'] == 1){ ?> required <?php } ?> class="regular-text" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="itpopup_option_name[<?php echo esc_attr($args['label_for']); ?>]" 
	 value="<?php echo !empty($it_popup_options[esc_attr($args['label_for'])]) ?( esc_attr($it_popup_options[$args['label_for']]) ):('') ;?>" />
	 <p class="description_field"><?php _e('Put your popup window footer text.','it_modal_popup'); ?></p>
<?php
}

/* Settings Footer Background Callback function */
function itpopup_ft_text_bg_field_callback_function( $args ){
	$it_popup_options = get_option( 'itpopup_option_name' );
?>
	<input class="color itpopup_ft_text_bg_field" type="text" name="itpopup_option_name[<?php echo esc_attr($args['label_for']); ?>]" id="pop_bordercolor" 
	id="pop_bordercolor" value="<?php echo !empty($it_popup_options[esc_attr($args['label_for'])]) ?( esc_attr($it_popup_options[$args['label_for']]) ):('#00ff59') ;?>" maxlength="7" />
	<p class="description_field"><?php _e('Select your popup window footer background color. (Ex: #4D4D4D)','it_modal_popup'); ?></p>
<?php	
}

/* Settings Footer Title Color Callback function */
function itpopup_ft_text_color_field_callback_function( $args ){
	$it_popup_options = get_option( 'itpopup_option_name' );
?>
	<input class="color itpopup_ft_text_color_field" type="text" name="itpopup_option_name[<?php echo esc_attr($args['label_for']); ?>]" id="pop_bordercolor" 
	id="pop_bordercolor" value="<?php echo !empty($it_popup_options[esc_attr($args['label_for'])]) ?( esc_attr($it_popup_options[$args['label_for']]) ):('#000000') ;?>" maxlength="7" />
	<p class="description_field"><?php _e('Select your popup window footer title color. (Ex: #4D4D4D)','it_modal_popup'); ?></p>
<?php	
}

/* Settings Body WYSISYG Callback Function */
function itpopup_body_field_callback_function( $args ){
	$content = get_option('itpopup_option_body');
?>
<?php	
    /* WYSISYG (Required Field *** no required attribute provided for this editor, we are using setting.js to check if it's empty or not ***) */
	wp_editor( $content, 'itpopup_option_body', $settings = array('textarea_rows'=> '15') ); 
?>	
	<p class="description_field"><?php _e('Put your popup content. It supports all shortcodes.','it_modal_popup'); ?></p>
<?php
} 

/* Adding Admin Page */
add_action('admin_menu', 'itpopup_add_modal_admin_page');
function itpopup_add_modal_admin_page()
{
    add_submenu_page(
        'options-general.php', /* Adding this submenu to Settings Main Menu */
        __('IT Popups','it_modal_popup'),
        __('IT Popups','it_modal_popup'),
        'manage_options',
        'it_modal_popup',
        'itpopup_modal_callback_function'
    );
}

/* Admin Page Callback Function */
function itpopup_modal_callback_function(){
	/* Check user capability */
	if ( ! current_user_can( 'manage_options' ) ) {
 		return;
 	}
 	/* wordpress will add the "settings-updated" $_GET parameter to the url */
	if ( isset( $_GET['settings-updated'] ) ) {
	// add settings saved message with the class of "updated"
		add_settings_error( 'itpopup_messages', 'itpopup_message', __( 'PopUp Settings Saved Successfully', 'it_modal_popup' ), 'updated' );
	}
	 
	?>
  <div class="wrap">
    <form action="options.php" method="post" class="it_popup_form" name="itpopup_modal_form" onsubmit="return itpopup_modal_submit()"> <!-- Settings Form (onsubmit function is called to check required fields) -->
   	<!-- Display Settings Here -->
   	<?php

   	 // output security fields for the registered setting "it_modal_popup"
	 settings_fields( 'it_modal_popup' );
	 
	 // output setting sections and their fields
	 do_settings_sections( 'it_modal_popup' );
	 
	 // output save settings button
	 submit_button( 'Save Settings' );

   	?>

   </form>
  </div><!-- wrap -->
  <?php
}

/* Building Shortcode */
function itpopup_modal_shortcodes_init(){
	function itpopup_show_modal_front(){
		/* get options */
		$get_modal_options  = get_option('itpopup_option_name');
		$get_modal_body   = get_option('itpopup_option_body');

		if( isset($get_modal_options) && isset($get_modal_body) && isset($get_modal_options['itpopup_field_button_text'])){
			$post_ids = explode(",",str_replace(' ', '', $get_modal_options['itpopup_restrict_posts_select'])); 
		?>
	<!-- Modal Button -->
	<?php 
		/* Detect HTML Tags */
		if($get_modal_options['itpopup_field_button_text'] != strip_tags($get_modal_options['itpopup_field_button_text'])) {
    		echo "<div class='itpopup_modal_btn'>".$get_modal_options['itpopup_field_button_text']."</div>"; /* Image or HTML link */
		}else{
	?>
			<button class="itpopup_modal_btn"><?= $get_modal_options['itpopup_field_button_text']; ?></button>
	<?php
		}
	?>

	<!-- The Modal -->
	<div id="auto_load_box" class="<?php if($get_modal_options['itpopup_display_only_once'] == 1){ echo 'display_only_once_itpopup'; } ?> <?php if($get_modal_options['itpopup_display_on_load'] == 1 && $get_modal_options['itpopup_display_on_front_page'] == 1){ echo 'autoload_yes'; } 
		else if($get_modal_options['itpopup_display_on_load'] == 1 && $get_modal_options['itpopup_display_on_front_page'] != 1){ if(!in_array(get_the_ID(), $post_ids)){ echo 'autoload_yes'; }  } ?>">
		<div id="itpopup_Modal" class="itpopup-modal">
			<!-- Modal content -->
		  <div class="modal-content" style="<?php echo 'width:'.esc_attr($get_modal_options['itpopup_field_width']).'px;'; ?>">
		    <div class="modal-header" style="background-color:<?php echo esc_attr($get_modal_options['itpopup_field_title_bgcolor']); ?>"> <!-- Modal Header -->
		      <h2 class="modal-title" style="color:<?php echo esc_attr($get_modal_options['itpopup_field_title_color']); ?>"><?= strip_tags($get_modal_options['itpopup_field_title'],'it_modal_popup'); ?></h2>
		      <span class="close_itpopup">&times;</span> <!-- Modal Close icon -->
		      <div class="clear"></div> 
			</div>
		    <div class="modal-body" style="<?php echo 'height:'.esc_attr($get_modal_options['itpopup_field_height']).'px;';  ?>" >
		      <?php echo do_shortcode(wpautop($get_modal_body),'it_modal_popup'); ?> <!-- Modal Body -->
		    </div>

		   	<?php if($get_modal_options['itpopup_checkbox_ft'] == 1){ ?>
		    <div class="modal-footer" style="background-color:<?php echo esc_attr($get_modal_options['itpopup_field_ft_text_bg']); ?>"> <!-- Modal Footer -->
		      <h3 style="color:<?php echo esc_attr($get_modal_options['itpopup_field_ft_title_color']); ?>"><?= $get_modal_options['itpopup_field_ft_text']; ?></h3>
		    </div>
		    <?php } ?>
		  </div><!-- modal-content -->
		</div><!-- itpopup_Modal -->
	</div>

	<?php
		}
	}
	add_shortcode("IT_MODAL_POPUP","itpopup_show_modal_front");
}
add_action('init', 'itpopup_modal_shortcodes_init');

/* Registering and Enqueuing Frontend Styles */
function itpopup_front_modal_css_and_js()
{
	// Enqueue the style & scripte:
	wp_enqueue_style('itpopup_modal_css', plugins_url( 'assets/css/itpopup-front.css', __FILE__ ), array(),'1.0', 'all');
	wp_enqueue_script('itpopup_modal_js', plugins_url( 'assets/js/itpopup-front.js', __FILE__ ), array('jquery'),'1.0', true);

}
add_action( 'wp_enqueue_scripts', 'itpopup_front_modal_css_and_js'); 

/* Registering and Enqueuing Admin Scripts */
function itpopup_admin_modal_js()
{
	// Enqueue the JS:
	wp_enqueue_script('itpopup_modal_admin_validity_js', plugins_url( 'assets/js/itpopup-validity.js', __FILE__ ), array('jquery'),'1.0', true);
	wp_enqueue_script('itpopup_modal_admin_color_js', plugins_url( 'assets/js/color/jscolor.js', __FILE__ ), array('jquery'),'1.0', true);
}
add_action( 'admin_enqueue_scripts', 'itpopup_admin_modal_js'); 

/* Registering and Enqueuing Admin Styles */
function itpopup_admin_modal_css()
{
	// Enqueue the style:
	wp_enqueue_style('itpopup_modal_admin_css', plugins_url( 'assets/css/itpopup-admin.css', __FILE__ ), array(),'1.0', 'all');
}
add_action( 'admin_print_styles', 'itpopup_admin_modal_css'); 




  