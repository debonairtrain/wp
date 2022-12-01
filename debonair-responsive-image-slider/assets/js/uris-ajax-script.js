function cis_clone_run(post_id){
	var cis_clone_nonce = jQuery("#cis_clone_nonce").val();
	console.log(cis_clone_nonce);
	if(confirm("Are you sure want to create clone of this slider?")){
		var cisformData = {
			'action': 'cis_clone_slider',
			'ursi_clone_post_id': post_id,
			'cis_clone_nonce': cis_clone_nonce
		};

		jQuery.ajax({
			type: "post",
			dataType: "json",
			url: cis_ajax_object.ajax_url,
			data: CisformData,
			success: function(response){
				//console.log('Got this from the server: ' + response);
				//jQuery('.cis-clone-success').show().fadeOut(4000, 'linear');
				jQuery('.cis-clone-success').show();
			}
		});
	}
}
