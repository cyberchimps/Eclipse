jQuery(document).ready(function($) {
	function ec_check_slider_value(value) {
		var slider_value = $(value).val();
		
		if ( slider_value == "0" ) {
			$(".slider_media_type, .slider_image, .slider_url, .slider_video, .slider_text_align, .slider_caption").fadeIn();
			
			ec_check_media_value("select[name=\'slider_media_type\']");

		} else if ( slider_value == "1" ) {
			$(".slider_media_type, .slider_image, .slider_url, .slider_video").fadeIn();
			$(".slider_text_align, .slider_caption").hide();
			
			ec_check_media_value("select[name=\'slider_media_type\']");

		} else if ( slider_value == "2" ){
			$(".slider_text_align, .slider_caption").fadeIn();
			$(".slider_media_type, .slider_image, .slider_url, .slider_video").hide();
		}	
		return false;
	}
	
	function ec_check_media_value(value) {
		var media_value = $(value).val();
		
		if ( media_value == "0" ) {
			$(".slider_image, .slider_url").fadeIn();
			$(".slider_video").hide();
			
		} else if ( media_value == "1" ) {
			$(".slider_video").fadeIn();
			$(".slider_image, .slider_url").hide();
			
		}
		return false;
	}

	ec_check_slider_value("select[name=\'slider_type\']");

	$("select[name=\'slider_type\']").change(function() {
		ec_check_slider_value(this);
	});
	
	$("select[name=\'slider_media_type\']").change(function() {
		ec_check_media_value(this);
	});
});

jQuery(document).ready(function($) {
	function if_check_slider_value(value) {
		var slider_value = $('select#ec_slider_type').val();
		
		if ( slider_value == "posts" ) {
			$(".ec_row_custom").hide();
			$(".ec_row_posts").fadeIn();
		} else if ( slider_value == "custom" ){
			$(".ec_row_posts").hide();
			$(".ec_row_custom").fadeIn();
		}
	
		return false;
	}

	if_check_slider_value();

	$("select#ec_slider_type").change(function() {
		if_check_slider_value();
	});
});

jQuery(document).ready(function($) {
	function if_check_slider_value(value) {
		var slider_value = $("select[name=\'page_slider_type\']").val();
		
		if ( slider_value == "0" ) {
			$(".slider_blog_category").hide();
			$(".slider_category").fadeIn();
		} else if ( slider_value == "1" ){
			$(".slider_category").hide();
			$(".slider_blog_category").fadeIn();
		}

		return false;
	}

	if_check_slider_value();

	$("select[name=\'page_slider_type\']").change(function() {
		if_check_slider_value();
	});
});

jQuery(document).ready(function($) {
	function ec_check_product_value(value) {
		var product_value = $("select[name=\'product_type\']").val();

		if ( product_value == "0" ) {
			$(".product_video").hide();
			$(".product_image").fadeIn();
		} else if ( product_value == "1" ){
			$(".product_image").hide();
			$(".product_video").fadeIn();
		}

		return false;
	}

	ec_check_product_value();

	$("select[name=\'product_type\']").change(function() {
		ec_check_product_value();
	});
});