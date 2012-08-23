/**
 * Prints out the inline javascript needed for the colorpicker and choosing
 * the tabs in the panel.
 */

jQuery(document).ready(function($) {

  $("#ec_custom_logo").change(function() {
    var toShow = $("#section-ec_logo");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
	$("#ec_logo_url_toggle").change(function() {
    var toShow = $("#section-ec_logo_url");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
	$("#ec_favicon_toggle").change(function() {
    var toShow = $("#section-ec_favicon");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
		}).change();	
	$("#ec_apple_touch_toggle").change(function() {
    var toShow = $("#section-ec_apple_touch");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
		}).change();	
  $("#section-ec_font").change(function() {
    if($(this).find(":selected").val() == 'custom') {
      $('#section-ec_custom_font').fadeIn();
    } else {
      $('#section-ec_custom_font').hide();
    }
  }).change();
  $("#section-ec_menu_font").change(function() {
    if($(this).find(":selected").val() == 'custom') {
      $('#section-ec_custom_menu_font').fadeIn();
    } else {
      $('#section-ec_custom_menu_font').hide();
    }
  }).change();
    $("#section-ec_front_product_type").change(function() {
    if($(this).find(":selected").val() == 'key1') {
      $('#section-ec_front_product_image').fadeIn();
    } else ec
  }).change();
     $("#section-ec_front_product_type").change(function() {
    if($(this).find(":selected").val() == 'key2') {
      $('#section-ec_front_product_video').fadeIn();
    } else {
      $('#section-ec_front_product_video').hide();
    }
  }).change();
   $("#section-ec_blog_product_type").change(function() {
    if($(this).find(":selected").val() == 'key1') {
      $('#section-ec_blog_product_image').fadeIn();
    } else {
      $('#section-ec_blog_product_image').hide();
    }
  }).change();
     $("#section-ec_blog_product_type").change(function() {
    if($(this).find(":selected").val() == 'key2') {
      $('#section-ec_blog_product_video').fadeIn();
    } else {
      $('#section-ec_blog_product_video').hide();
    }
  }).change();

  $("#ec_show_excerpts").change(function() {
    var toShow = $("#section-ec_excerpt_link_text, #section-ec_excerpt_length");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
  $("#ec_portfolio_title_toggle").change(function() {
    var toShow = $("#section-ec_portfolio_title");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
    $("#ec_blog_product_link_toggle").change(function() {
    var toShow = $("#section-ec_blog_product_link_url, #section-ec_blog_product_link_text");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
   $("#ec_front_product_link_toggle").change(function() {
    var toShow = $("#section-ec_front_product_link_url, #section-ec_front_product_link_text");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
   $("#ec_box_title_toggle").change(function() {
    var toShow = $("#section-ec_box_title");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();	
     $("#ec_recent_posts_title_toggle").change(function() {
    var toShow = $("#section-ec_recent_posts_title");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
  $("#ec_show_featured_images").change(function() {
    var toShow = $("#section-ec_featured_image_align, #section-ec_featured_image_height, #section-ec_featured_image_width");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
    $("#ec_disable_footer").change(function() {
    var toShow = $("#section-ec_footer_text, #section-ec_hide_link");
    if($(this).is(':checked')) {
      toShow.fadeIn();
    } else {
      toShow.fadeOut();
    }
  }).change();
      $("#ec_custom_background").change(function() {
    var toShow = $("#section-ec_background_upload, #section-ec_bg_image_position, #section-ec_bg_image_repeat, #section-ec_background_color, #section-ec_bg_image_attachment ");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
   }).change();
      $("#ec_custom_menu_color_toggle").change(function() {
    var toShow = $("#section-ec_custom_menu_color, #section-ec_custom_dropdown_color, #section-ec_menulink_color, #section-ec_menu_hover_color ");
    if($(this).is(':checked')) {
      toShow.show();
    } else {
      toShow.hide();
    }
  }).change();
  $("#ec_slider_type").change(function(){
    var val = $(this).val(),
      post = $("#section-ec_slider_category"),
      custom = $("#section-ec_customslider_category");
    if(val == 'custom') {
      post.hide(); custom.show();
    } else {
      post.show(); custom.hide();
    }
  }).change();

  $.each(['twitter', 'facebook', 'gplus', 'flickr', 'linkedin', 'pinterest', 'youtube', 'googlemaps', 'email', 'rsslink'], function(i, val) {
	  $("#section-ec_" + val).each(function(){
		  var $this = $(this), $next = $(this).next();
		  $this.find(".controls").css({float: 'left', clear: 'both'});
		  $next.find(".controls").css({float: 'right', width: 80});
		  $next.hide();
		  $this.find('.option').before($next.find(".option"));
		  $this.find("input[type='checkbox']").change(function() {
			  if($(this).is(":checked")) {
				  $(this).closest('.option').next().show();
			  } else {
				  $(this).closest('.option').next().hide();
			  }
		  }).change();
	  });
  });
});	

jQuery(function($) {
	var initialize = function(id) {
		var el = $("#" + id);
		function update(base) {
			var hidden = base.find("input[type='hidden']");
			var val = [];
			base.find('.right_list .list_items span').each(function() {
				val.push($(this).data('key'));
			});
			hidden.val(val.join(",")).change();
			el.find('.right_list .action').show();
			el.find('.left_list .action').hide();
		}
		el.find(".left_list .list_items").delegate(".action", "click", function() {
			var item = $(this).closest('.list_item');
			$(this).closest('.section_order').children('.right_list').children('.list_items').append(item);
			update($(this).closest(".section_order"));
		});
		el.find(".right_list .list_items").delegate(".action", "click", function() {
			var item = $(this).closest('.list_item');
			$(this).val('Add');
			$(this).closest('.section_order').children('.left_list').children('.list_items').append(item);
			$(this).hide();
			update($(this).closest(".section_order"));
		});
		el.find(".right_list .list_items").sortable({
			update: function() {
				update($(this).closest(".section_order"));
			},
			connectWith: '#' + id + ' .left_list .list_items'
		});

		el.find(".left_list .list_items").sortable({
			connectWith: '#' + id + ' .right_list .list_items'
		});

		update(el);
	}

	$('.section_order').each(function() {
		initialize($(this).attr('id'));
	});

	$("input[name='eclipse[ec_blog_section_order]']").change(function(){
		var show = $(this).val().split(",");
		var map = {
			response_blog_slider: "subsection-featureslider",
			response_post: "subsection-blogoptions",
			response_callout_section: "subsection-calloutoptions",
			response_portfolio_element: "subsection-portfoliooptions",
			response_box_section: "subsection-boxoptions",
			response_recent_posts_element: "subsection-recentpostsoptions",
			response_twitterbar_section: "subsection-twtterbaroptions",
			response_index_carousel_section: "subsection-carouseloptions",
			response_product_element: "subsection-productoptions"
			// , response_box_section: ""
		};

		$.each(map, function(key, value) {
			$("#" + value).hide();
			$.each(show, function(i, show_key) {
				if(key == show_key)
					$("#" + value).show();
			});
		});
	}).trigger('change');
	
		$("input[name='eclipse[ec_front_section_order]']").change(function(){
		var show = $(this).val().split(",");
		var map = {
			response_portfolio_element: "subsection-portfolio",
			response_twitterbar_section: "subsection-twtterbar",
			response_box_section: "subsection-box",
			response_recent_posts_element: "subsection-recentposts",
			// , response_box_section: ""
		};

		$.each(map, function(key, value) {
			$("#" + value).hide();
			$.each(show, function(i, show_key) {
				if(key == show_key)
					$("#" + value).show();
			});
		});
	}).trigger('change');
	
	$("input[name='response[header_section_order]']").change(function(){
		var show = $(this).val().split(",");
		var map = {
			response_sitename_contact: "section-ec_header_contact",
			response_description_icons: "subsection-social"
			// , response_box_section: ""
		};

		$.each(map, function(key, value) {
			$("#" + value).hide();
			$.each(show, function(i, show_key) {
				if(key == show_key)
					$("#" + value).show();
			});
		});
	}).trigger('change');

});
