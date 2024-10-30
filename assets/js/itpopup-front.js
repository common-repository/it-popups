/* IT Popup Modal Open/Close JS*/

jQuery( document ).ready(function($) {
	
	// Check Autoload
	if($("#auto_load_box").hasClass("autoload_yes")){
		if($("#auto_load_box").hasClass("display_only_once_itpopup")){
			if(localStorage.getItem('itpopup_state_load') != 'itpopup_shown_popup'){
		    	itpopup_display_onload(); // Show Popup
		    	localStorage.setItem('itpopup_state_load','itpopup_shown_popup'); // Set Local Storage For Display Only Once Check
			}else{
		    	// Popup Already Shown
			}
		}else{
			itpopup_display_onload(); // Show Popup
		}
	}

	// Get the modal
	var itpopup_modal_box = document.getElementById('itpopup_Modal');

	$(".itpopup_modal_btn").click(function(){
		$("#itpopup_Modal").css("display","block");
	});

	// When the user clicks on <span> (x), close the modal
	$(".close_itpopup").click(function() {
		$("#itpopup_Modal").css("display","none");
	});

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == itpopup_modal_box) {
		    $("#itpopup_Modal").css("display","none");
		}
	}

	function itpopup_display_onload(){
		setTimeout(
			    function() {
			      $("#itpopup_Modal").css("display","block");  // Show Auto Load Popup after 0.5 sec
			    }, 500
			);
	}
});