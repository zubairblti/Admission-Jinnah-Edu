jQuery(document).ready(function(){
	jQuery(".popup-opener").click(function({
		var id = jQuery(this).attr('data');
		var link = jQuery("#link_"+id).val();
		var des = jQuery("#des_"+id).val();
		var title = jQuery("#title_"+id).val();		
		jQuery("#popup_image").attr('src',link);
		jQuery("#popup_title").html(title);
		jQuery("#popup_description").html(des);
	}));
});
