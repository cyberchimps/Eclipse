<?php
/**
* Initializes the response Pro Theme Options
*
* Author: Tyler Cunningham
* Copyright: © 2011
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package response Pro
* @since 1.0
*/

require( get_template_directory() . '/core/classy-options/classy-options-framework/classy-options-framework.php');

add_action('init', 'chimps_init_options');

function chimps_init_options() {

global $options, $themeslug, $themename, $themenamefull;
$options = new ClassyOptions($themename, $themenamefull." Options");

$terms2 = get_terms('category', 'hide_empty=0');
	$blogoptions = array();                                  
	$blogoptions['all'] = "All";
    	foreach($terms2 as $term) {
        	$blogoptions[$term->slug] = $term->name;
        }

$options
	->section("Welcome")
		->info("<h1>Eclipse</h1>
		
<p><strong>Eclipse Professional Responsive WordPress Theme</strong></p>

<p>Eclipse from CyberChimps WordPress Themes is a Professional Responsive WordPress Theme perfect for any response on any device. It gives your company the tools to turn WordPress into a modern Drag and Drop Content Management System (CMS).</p>

<p>To get started simply work your way through the menus to the left, select your options, add your content, and always remember to hit save after making any changes.</p>

<p>We tried to make Eclipse as easy to use as possible, but if you still need help please read the <a href='http://cyberchimps.com/eclipse/docs/' target='_blank'>documentation</a>, and visit our <a href='http://cyberchimps.com/forum/pro/' target='_blank'>support forum</a>.</p>

<p>Thank you for using Eclipse.</p>

<p><strong>A Professional WordPress Theme</strong></p>
")
	->section("Design")
		->subsection("Typography")
			->select($themeslug."_font", "Choose a Font", array( 'options' => array("Helvetica" => "Helvetica (default)", "Arial" => "Arial", "Courier New" => "Courier New", "Georgia" => "Georgia", "Lucida Grande" => "Lucida Grande", "Open Sans" => "Open Sans", "Tahoma" => "Tahoma", "Times New Roman" => "Times New Roman", "Verdana" => "Verdana", "Maven+Pro" => "Maven Pro", "Ubuntu" => "Ubuntu")))	
			->select($themeslug."_secondary_font", "Choose a Secondary Font", array( 'options' => array("Open Sans" => "Open Sans (default)", "Arial" => "Arial", "Courier New" => "Courier New", "Georgia" => "Georgia", "Helvetica" => "Helvetica", "Lucida Grande" => "Lucida Grande",  "Tahoma" => "Tahoma", "Times New Roman" => "Times New Roman", "Verdana" => "Verdana", "Maven+Pro" => "Maven Pro", "Ubuntu" => "Ubuntu")))	
		->subsection_end()
		->subsection("Custom Colors")
			->color($themeslug."_text_color", "Text Color")
			->color($themeslug."_link_color", "Link Color")
			->color($themeslug."_link_hover_color", "Link Hover Color")
		->subsection_end()
			->open_outersection()
				->checkbox($themeslug."_lazy_load", "Lazy Load Image Effect", array('default' => true))
				->checkbox($themeslug."_responsive_video", "Responsive Videos")
			->close_outersection()
		->section("Header")
		->open_outersection()
			->section_order("header_section_order", "Drag & Drop Elements", array('options' => array("response_logo_menu" => "Logo + Menu", "response_description_icons" => "Description + Icons"), 'default' => 'response_logo_menu'))
		->close_outersection()
			->subsection("Header Options")
			->checkbox($themeslug."_custom_logo", "Custom Logo")
			->upload($themeslug."_logo", "Logo")
			->upload($themeslug."_favicon", "Custom Favicon")
			->upload($themeslug."_apple_touch", "Apple Touch Icon", array('default' => array('url' => TEMPLATE_URL . '/images/apple-icon.png')))
		->subsection_end()
		->subsection("Menu Options")
			->select($themeslug."_menu_font", "Choose a Font", array( 'options' => array("Helvetica" => "Helvetica (default)", "Arial" => "Arial", "Courier New" => "Courier New", "Georgia" => "Georgia", "Lucida Grande" => "Lucida Grande", "Open Sans" => "Open Sans", "Tahoma" => "Tahoma", "Times New Roman" => "Times New Roman", "Verdana" => "Verdana", "Maven+Pro" => "Maven Pro", "Ubuntu" => "Ubuntu")))			
		->subsection_end()
		->subsection("Social")
			->text($themeslug."_twitter", "Twitter Icon URL", array('default' => 'http://twitter.com'))
			->checkbox($themeslug."_hide_twitter_icon", "Hide Twitter Icon", array('default' => true))
			->text($themeslug."_facebook", "Facebook Icon URL", array('default' => 'http://facebook.com'))
			->checkbox($themeslug."_hide_facebook_icon", "Hide Facebook Icon" , array('default' => true))
			->text($themeslug."_gplus", "Google + Icon URL", array('default' => 'http://plus.google.com'))
			->checkbox($themeslug."_hide_gplus_icon", "Hide Google + Icon" , array('default' => true))
			->text($themeslug."_flickr", "Flickr Icon URL", array('default' => 'http://flikr.com'))
			->checkbox($themeslug."_hide_flickr", "Hide Flickr Icon")
			->text($themeslug."_pinterest", "Pinterest Icon URL", array('default' => 'http://pinterest.com'))
			->checkbox($themeslug."_hide_pinterest", "Hide Pinterest Icon")
			->text($themeslug."_linkedin", "LinkedIn Icon URL", array('default' => 'http://linkedin.com'))
			->checkbox($themeslug."_hide_linkedin", "Hide LinkedIn Icon")
			->text($themeslug."_youtube", "YouTube Icon URL", array('default' => 'http://youtube.com'))
			->checkbox($themeslug."_hide_youtube", "Hide YouTube Icon")
			->text($themeslug."_googlemaps", "Google Maps Icon URL", array('default' => 'http://maps.google.com'))
			->checkbox($themeslug."_hide_googlemaps", "Hide Google maps Icon")
			->text($themeslug."_email", "Email Address")
			->checkbox($themeslug."_hide_email", "Hide Email Icon")
			->text($themeslug."_rsslink", "RSS Icon URL")
			->checkbox($themeslug."_hide_rss_icon", "Hide RSS Icon" , array('default' => true))
		->subsection_end()
		->subsection("Tracking")
			->textarea($themeslug."_ga_code", "Google Analytics Code")
		->subsection_end()
		->section("Blog")
		->open_outersection()
			->section_order($themeslug."_blog_section_order", "Drag & Drop Elements", array('options' => array("response_post" => "Post Page", "response_blog_slider" => "Feature Slider", "response_twitterbar_section" => "Twitter Bar", "response_portfolio_element" => "Portfolio","response_recent_posts_element" => "Recent Posts"), "default" => 'response_blog_slider,response_portfolio_element,response_twitterbar_section,response_post'))
		->close_outersection()
		->subsection("Blog Options")
			->images($themeslug."_blog_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_post_formats", "Post Format Icons",  array('default' => true))
			->checkbox($themeslug."_show_excerpts", "Post Excerpts")
			->text($themeslug."_excerpt_link_text", "Excerpt Link Text", array('default' => 'Continue Reading'))
			->text($themeslug."_excerpt_length", "Excerpt Character Length", array('default' => '55'))
			->checkbox($themeslug."_show_featured_images", "Featured Images")
			->multicheck($themeslug."_hide_byline", "Post Byline Elements", array( 'options' => array($themeslug."_hide_author" => "Author" , $themeslug."_hide_categories" => "Categories", $themeslug."_hide_date" => "Date", $themeslug."_hide_comments" => "Comments",  $themeslug."_hide_tags" => "Tags"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
		->subsection_end()
		->subsection("Feature Slider")
			->upload($themeslug."_blog_slide_one_image", "Slide One Image", array('default' => array('url' => TEMPLATE_URL . '/images/responseslider.jpg')))
			->text($themeslug."_blog_slide_one_url", "Slide One Link", array('default' => 'http://cyberchimps.com'))
			->upload($themeslug."_blog_slide_two_image", "Slide Two", array('default' => array('url' => TEMPLATE_URL . '/images/responseslider.jpg')))
			->text($themeslug."_blog_slide_two_url", "Slide Two Link", array('default' => 'http://cyberchimps.com'))
			->upload($themeslug."_blog_slide_three_image", "Slide Three", array('default' => array('url' => TEMPLATE_URL . '/images/responseslider.jpg')))
			->text($themeslug."_blog_slide_three_url", "Slide Three Link", array('default' => 'http://cyberchimps.com'))
		->subsection_end()
		->subsection("Twtterbar Options")
			->text($themeslug."_blog_twitter", "Enter your Twitter handle", array('default' => 'cyberchimps'))
			->checkbox($themeslug."_blog_twitter_reply", "Show @ Replies")
		->subsection_end()
		->subsection("Box Options")
			->checkbox($themeslug."_blog_box_title_toggle", "Title", array('default' => true))
			->text($themeslug."_blog_box_title", "Title", array('default' => 'Widgetized Boxes'))
		->subsection_end()
		->subsection("Recent Posts Options")
			->checkbox($themeslug."_blog_recent_posts_title_toggle", "Title")
			->text($themeslug."_blog_recent_posts_title", "Title")
			->select($themeslug.'_blog_recent_posts_category', 'Post Category', array( 'options' => $blogoptions ))
			->checkbox($themeslug."_blog_recent_posts_images_toggle", "Images")
		->subsection_end()
		->subsection("Portfolio Options")
			->upload($themeslug."_blog_portfolio_image_one", "First Portfolio Image", array('default' => array('url' => TEMPLATE_URL . '/images/portfolio.jpg')))
			->text($themeslug."_blog_portfolio_image_one_caption", "First Portfolio Image Link", array('default' => 'Image 1'))
			->upload($themeslug."_blog_portfolio_image_two", "Second Portfolio Image", array('default' => array('url' => TEMPLATE_URL . '/images/portfolio.jpg')))
			->text($themeslug."_blog_portfolio_image_two_caption", "Second Portfolio Image Link", array('default' => 'Image 2'))
			->upload($themeslug."_blog_portfolio_image_three", "Third Portfolio Image", array('default' => array('url' => TEMPLATE_URL . '/images/portfolio.jpg')))
			->text($themeslug."_blog_portfolio_image_three_caption", "Third Portfolio Image Link", array('default' => 'Image 3'))
			->upload($themeslug."_blog_portfolio_image_four", "Fourth Portfolio Image", array('default' => array('url' => TEMPLATE_URL . '/images/portfolio.jpg')))
			->text($themeslug."_blog_portfolio_image_four_caption", "Fourth Portfolio Image Link", array('default' => 'Image 4'))
			->checkbox($themeslug."_blog_portfolio_title_toggle", "Portfolio Title", array('default' => true))
			->text($themeslug."_blog_portfolio_title", "Title", array('default' => 'Portfolio'))		
		->subsection_end()
		->subsection("SEO")
			->textarea($themeslug."_home_description", "Home Description")
			->textarea($themeslug."_home_keywords", "Home Keywords")
			->text($themeslug."_home_title", "Optional Home Title")
		->subsection_end()
	->section("Templates")
		->subsection("Single Post")
			->images($themeslug."_single_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_single_breadcrumbs", "Breadcrumbs", array('default' => true))
			->checkbox($themeslug."_single_show_featured_images", "Featured Images")
			->checkbox($themeslug."_single_post_formats", "Post Format Icons",  array('default' => true))
			->multicheck($themeslug."_single_hide_byline", "Post Byline Elements", array( 'options' => array($themeslug."_hide_author" => "Author" , $themeslug."_hide_categories" => "Categories", $themeslug."_hide_date" => "Date", $themeslug."_hide_comments" => "Comments",  $themeslug."_hide_tags" => "Tags"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
			->checkbox($themeslug."_post_pagination", "Post Pagination Links",  array('default' => true))
		->subsection_end()	
		->subsection("Archive")
			->images($themeslug."_archive_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_archive_breadcrumbs", "Breadcrumbs", array('default' => true))
			->checkbox($themeslug."_archive_show_excerpts", "Post Excerpts", array('default' => true))
			->checkbox($themeslug."_archive_post_formats", "Post Format Icons",  array('default' => true))
			->multicheck($themeslug."_archive_hide_byline", "Post Byline Elements", array( 'options' => array($themeslug."_hide_author" => "Author" , $themeslug."_hide_categories" => "Categories", $themeslug."_hide_date" => "Date", $themeslug."_hide_comments" => "Comments", $themeslug."_hide_tags" => "Tags"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
			->subsection_end()
		->subsection("Search")
			->images($themeslug."_search_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_search_show_excerpts", "Post Excerpts", array('default' => true))
		->subsection_end()
		->subsection("404")
			->images($themeslug."_404_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png',"two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))

			->textarea($themeslug."_custom_404", "Custom 404 Content")
		->subsection_end()
	->section("Footer")
		->open_outersection()
			->checkbox($themeslug."_disable_footer", "Footer", array('default' => true))
		->close_outersection()
;
}
