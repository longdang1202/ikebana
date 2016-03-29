jQuery(function($){
	jQuery('.rs-import-demo #rs-import').click(function(){
		$('#popup_select_style').slideDown();
		return false;
	});
	jQuery('#popup_select_style .choose_theme').click(function(){
		$import_true = confirm('Are you sure to import dummy content ? It will overwrite the existing data');
		if($import_true == false) return;
		jQuery('.rs-import-demo .import_message').html(' Data is being imported please be patient, while the awesomeness is being created :)  ');
		jQuery('.rs-import-demo .spinner').show();
		jQuery('.rs-import-demo #rs-import').hide();
		
		var data = {'action': 'rs_import', 'theme' : $(this).attr('rel') };
		
		jQuery.post(ajaxurl, data, function(response) {
			jQuery('.rs-import-demo .spinner').hide();
			jQuery('.rs-import-demo #rs-import').show();
			jQuery('.import_message').html('<div class="import_message_success">'+ response +'</div>');
		});
		return false;
	});
	jQuery('.rs-import-demo #rs-export').click(function(){
	
		var data = {'action': 'rs_export' };
		jQuery.post(ajaxurl, data, function(response) {
			jQuery('.rs-import-demo .spinner').hide();
			jQuery('.rs-import-demo #rs-import').show();
			jQuery('.import_message').html('<div class="import_message_success">'+ response +'</div>');
		});
	});
})