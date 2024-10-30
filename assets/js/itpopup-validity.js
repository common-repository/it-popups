/* IT Popup JS For Validation */
 
jQuery(document).ready(function ($) {	// Check if TinyMCE is active
	
	
	itpopup_check_footer_checkbox_field();      /* Checking Footer Checkbox */
	itpopup_check_display_on_load();			/* Checking Display On Load */
	itpopup_check_display_on_front_page_only(); /* Checking Restrict Page */

	/* Validating Popup Body Content */
	if (typeof tinyMCE != "undefined") {
		$('.itpopup_modal_form').on('submit', function () {
			var itpopup_body_editorContent = tinyMCE.activeEditor.getContent();					// Get content of active editor
			var itpopup_width_field_val = $('input#itpopup_field_width').attr('value');    // Getting Width Value
			var itpopup_height_field_val = $('input#itpopup_field_height').attr('value');  // Getting Height Value

			if ((itpopup_body_editorContent === '' || itpopup_body_editorContent === null)) {
				alert("Please enter the popup body.");
				return false;
			}
			else if(isNaN(itpopup_width_field_val)){   					// Width Value must be number
				alert("Please enter the popup  width, only in number.")
				return false;
			}else if(isNaN(itpopup_height_field_val)){ 					// Height Value must be number
				alert("Please enter the popup height, only in number.")
				return false;
			}
			
		});
	}

	 /* Add Required Attribute Tooter Text Field */
	 $(document).on('change', 'input#itpopup_checkbox_ft', function(e){
		itpopup_check_footer_checkbox_field();
	});

	 /* Show Display On Load Options */
	$(document).on('change', 'input#itpopup_display_on_load', function(e){
		itpopup_check_display_on_load();
	});

	 /* Show Display On Front Page Only */
	$(document).on('change', 'input#itpopup_display_on_front_page', function(e){
		itpopup_check_display_on_front_page_only();
	});

	
	/* Show/Hide Display On Load Fields */
	function itpopup_check_display_on_load(){
		var attr_display_on_load = $('input#itpopup_display_on_load').attr('checked');
		var attr_display_on_front_check = $('input#itpopup_display_on_front_page').attr('checked');
		if (typeof attr_display_on_load !== typeof undefined && attr_display_on_load !== false) {   
			$(this).attr('checked', 'checked');
			$('table tr.itpop_row_display_on_front_page').css('display','table-row');
			$('table tr.itpop_row_display_only_once').css('display','table-row');
			if (typeof attr_display_on_front_check !== typeof undefined && attr_display_on_front_check !== false) {
				$('table tr.itpop_row_restrict_posts_select').css('display','none');
			}else{
				$('table tr.itpop_row_restrict_posts_select').css('display','table-row');
			}	
		}else{
			$(this).removeAttr('checked');
			$('table tr.itpop_row_display_on_front_page').css('display','none');
			$('table tr.itpop_row_restrict_posts_select').css('display','none');
			$('table tr.itpop_row_display_only_once').css('display','none');
		}
	}

	/* Show/Hide Restrict Page Fields */
	function itpopup_check_display_on_front_page_only(){
		var attr_display_on_front_page = $('input#itpopup_display_on_front_page').attr('checked');
		var attr_display_on_load_check = $('input#itpopup_display_on_load').attr('checked');
		if (typeof attr_display_on_load_check !== typeof undefined && attr_display_on_load_check !== false) {
			if (typeof attr_display_on_front_page !== typeof undefined && attr_display_on_front_page !== false) {
				$('table tr.itpop_row_restrict_posts_select').css('display','none');
			}else{
				$('table tr.itpop_row_restrict_posts_select').css('display','table-row');
			}	
		}else{
			$('table tr.itpop_row_restrict_posts_select').css('display','table-row');
		}
	}


	/* Show/Hide Footer Fields */
	function itpopup_check_footer_checkbox_field(){
		var attr_footer_check = $('input#itpopup_checkbox_ft').attr('checked');
		if (typeof attr_footer_check !== typeof undefined && attr_footer_check !== false) {   
			$(this).attr('checked', 'checked');							// Adding Required Attribute
			$('#itpopup_field_ft_text').prop('required',true);		    // Adding checked Attribute
			$('table tr.itpopup_row_ft_text').css('display','table-row');
			$('table tr.itpopup_row_ft_title_color').css('display','table-row');
			$('table  .itpopup_row_ft_text_bg').css('display','table-row');
		}else{ 
			$(this).removeAttr('checked');   							// Removing checked Attribute
			$("#itpopup_field_ft_text").removeAttr("required");		    // Removing Required Attribute
			$('table tr.itpopup_row_ft_text').css('display','none');
			$('table tr.itpopup_row_ft_title_color').css('display','none');
			$('table tr.itpopup_row_ft_text_bg').css('display','none');
		}
	}

});

