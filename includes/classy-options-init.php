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

global $options, $ec_themeslug, $ec_themename, $ec_themenamefull;
$options = new ClassyOptions($ec_themename, $ec_themenamefull." Options");

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

<p>Eclipse offers the same advanced functionality as CyberChimps' other WordPress Themes including a Responsive Design that responds automatically to mobile devices such as the iPhone, iPad, and Android. Eclipse also includes Drag and Drop Elements such as the Portfolio Element, Responsive Feature Slider, Page Content, Twitter bar and Widgetized boxes. All of which can be used on a per-page basis using Drag and Drop Page Options that also include sidebar and layout options giving you the power to control the look and feel of every page of your website.
</p>

<p>To get started simply work your way through the menus to the left, select your options, add your content, and always remember to hit save after making any changes.</p>

<p>If you want even more amazing new features <a href='http://cyberchimps.com/eclipsepro/' target='_blank'>upgrade to Eclipse Pro</a> which includes a Custom Feature Slides, Product Element, Image Carousel, Widgetized Boxes, Callout section, expanded typography including TypeKit support, and many more powerful new features. Please visit <a href='http://cyberchimps.com/eclipsepro/' target='_blank'>CyberChimps.com</a> to learn more!</p>

<p>We tried to make Eclipse as easy to use as possible, but if you still need help please read the <a href='http://cyberchimps.com/eclipse/docs/' target='_blank'>documentation</a>, and visit our <a href='http://cyberchimps.com/forum/pro/' target='_blank'>support forum</a>.</p>

<p>Thank you for using Eclipse.</p>

<p><strong>A Professional WordPress Theme</strong></p>
")
	->section("Design")
		->subsection("Typography")
			->select($ec_themeslug."_font", "Choose a Font", array( 'options' => array("Helvetica" => "Helvetica (default)", "Arial" => "Arial", "Courier New" => "Courier New", "Georgia" => "Georgia", "Lucida Grande" => "Lucida Grande", "Open Sans" => "Open Sans", "Tahoma" => "Tahoma", "Times New Roman" => "Times New Roman", "Verdana" => "Verdana", "Maven+Pro" => "Maven Pro", "Ubuntu" => "Ubuntu")))	
			->select($ec_themeslug."_secondary_font", "Choose a Secondary Font", array( 'options' => array("Open Sans" => "Open Sans (default)", "Arial" => "Arial", "Courier New" => "Courier New", "Georgia" => "Georgia", "Helvetica" => "Helvetica", "Lucida Grande" => "Lucida Grande",  "Tahoma" => "Tahoma", "Times New Roman" => "Times New Roman", "Verdana" => "Verdana", "Maven+Pro" => "Maven Pro", "Ubuntu" => "Ubuntu")))	
		->subsection_end()
		->subsection("Custom Colors")
			->color($ec_themeslug."_text_color", "Text Color")
			->color($ec_themeslug."_link_color", "Link Color")
			->color($ec_themeslug."_link_hover_color", "Link Hover Color")
		->subsection_end()
			->open_outersection()
				->checkbox($ec_themeslug."_responsive_video", "Responsive Videos")
			->close_outersection()
		->section("Header")
		->open_outersection()
			->section_order("header_section_order", "Drag & Drop Elements", array('options' => array("response_logo_menu" => "Logo + Menu", "response_description_icons" => "Description + Icons"), 'default' => 'response_logo_menu'))
		->close_outersection()
			->subsection("Header Options")
			->checkbox($ec_themeslug."_custom_logo", "Custom Logo")
			->upload($ec_themeslug."_logo", "Logo")
			->checkbox($ec_themeslug."_logo_url_toggle", "Logo Custom URL" , array('default' => false))
			->text($ec_themeslug."_logo_url", "Custom URL")
			->checkbox($ec_themeslug."_favicon_toggle", "Favicon" , array('default' => false))
			->upload($ec_themeslug."_favicon", "Custom Favicon", array('default' => array('url' => TEMPLATE_URL . '/images/favicon.ico')))
			->checkbox($ec_themeslug."_apple_touch_toggle", "Apple Touch Icon" , array('default' => false))
			->upload($ec_themeslug."_apple_touch", "Apple Touch Icon", array('default' => array('url' => TEMPLATE_URL . '/images/apple-icon.png')))
		->subsection_end()
		->subsection("Menu Options")
			->select($ec_themeslug."_menu_font", "Choose a Font", array( 'options' => array("Helvetica" => "Helvetica (default)", "Arial" => "Arial", "Courier New" => "Courier New", "Georgia" => "Georgia", "Lucida Grande" => "Lucida Grande", "Open Sans" => "Open Sans", "Tahoma" => "Tahoma", "Times New Roman" => "Times New Roman", "Verdana" => "Verdana", "Maven+Pro" => "Maven Pro", "Ubuntu" => "Ubuntu")))			
		->subsection_end()
		->subsection("Social")
			->text($ec_themeslug."_twitter", "Twitter Icon URL", array('default' => 'http://twitter.com'))
			->checkbox($ec_themeslug."_hide_twitter_icon", "Hide Twitter Icon", array('default' => true))
			->text($ec_themeslug."_facebook", "Facebook Icon URL", array('default' => 'http://facebook.com'))
			->checkbox($ec_themeslug."_hide_facebook_icon", "Hide Facebook Icon" , array('default' => true))
			->text($ec_themeslug."_gplus", "Google + Icon URL", array('default' => 'http://plus.google.com'))
			->checkbox($ec_themeslug."_hide_gplus_icon", "Hide Google + Icon" , array('default' => true))
			->text($ec_themeslug."_flickr", "Flickr Icon URL", array('default' => 'http://flikr.com'))
			->checkbox($ec_themeslug."_hide_flickr", "Hide Flickr Icon")
			->text($ec_themeslug."_pinterest", "Pinterest Icon URL", array('default' => 'http://pinterest.com'))
			->checkbox($ec_themeslug."_hide_pinterest", "Hide Pinterest Icon")
			->text($ec_themeslug."_linkedin", "LinkedIn Icon URL", array('default' => 'http://linkedin.com'))
			->checkbox($ec_themeslug."_hide_linkedin", "Hide LinkedIn Icon")
			->text($ec_themeslug."_youtube", "YouTube Icon URL", array('default' => 'http://youtube.com'))
			->checkbox($ec_themeslug."_hide_youtube", "Hide YouTube Icon")
			->text($ec_themeslug."_googlemaps", "Google Maps Icon URL", array('default' => 'http://maps.google.com'))
			->checkbox($ec_themeslug."_hide_googlemaps", "Hide Google maps Icon")
			->text($ec_themeslug."_email", "Email Address")
			->checkbox($ec_themeslug."_hide_email", "Hide Email Icon")
			->text($ec_themeslug."_rsslink", "RSS Icon URL")
			->checkbox($ec_themeslug."_hide_rss_icon", "Hide RSS Icon" , array('default' => true))
		->subsection_end()
		->subsection("Tracking")
			->textarea($ec_themeslug."_ga_code", "Google Analytics Code")
		->subsection_end()
		->section("Blog")
		->open_outersection()
			->section_order($ec_themeslug."_blog_section_order", "Drag & Drop Elements", array('options' => array("response_post" => "Post Page", "response_blog_slider" => "Feature Slider", "response_twitterbar_section" => "Twitter Bar", "response_portfolio_element" => "Portfolio","response_recent_posts_element" => "Recent Posts"), "default" => 'response_blog_slider,response_portfolio_element,response_twitterbar_section,response_post'))
		->close_outersection()
		->subsection("Blog Options")
			->images($ec_themeslug."_blog_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($ec_themeslug."_post_formats", "Post Format Icons",  array('default' => true))
			->checkbox($ec_themeslug."_show_excerpts", "Post Excerpts")
			->text($ec_themeslug."_excerpt_link_text", "Excerpt Link Text", array('default' => 'Continue Reading'))
			->text($ec_themeslug."_excerpt_length", "Excerpt Character Length", array('default' => '55'))
			->checkbox($ec_themeslug."_show_featured_images", "Featured Images")
			->multicheck($ec_themeslug."_hide_byline", "Post Byline Elements", array( 'options' => array($ec_themeslug."_hide_author" => "Author" , $ec_themeslug."_hide_categories" => "Categories", $ec_themeslug."_hide_date" => "Date", $ec_themeslug."_hide_comments" => "Comments",  $ec_themeslug."_hide_tags" => "Tags"), 'default' => array( $ec_themeslug."_hide_tags" => true, $ec_themeslug."_hide_author" => true, $ec_themeslug."_hide_date" => true, $ec_themeslug."_hide_comments" => true, $ec_themeslug."_hide_categories" => true ) ) )
		->subsection_end()
		->subsection("Feature Slider")
			->upload($ec_themeslug."_blog_slide_one_image", "Slide One Image", array('default' => array('url' => TEMPLATE_URL . '/images/sliderdefault.jpg')))
			->text($ec_themeslug."_blog_slide_one_url", "Slide One Link", array('default' => 'http://wordpress.org'))
			->upload($ec_themeslug."_blog_slide_two_image", "Slide Two", array('default' => array('url' => TEMPLATE_URL . '/images/sliderdefault.jpg')))
			->text($ec_themeslug."_blog_slide_two_url", "Slide Two Link", array('default' => 'http://wordpress.org'))
			->upload($ec_themeslug."_blog_slide_three_image", "Slide Three", array('default' => array('url' => TEMPLATE_URL . '/images/slide3.jpg')))
			->text($ec_themeslug."_blog_slide_three_url", "Slide Three Link", array('default' => 'http://wordpress.org'))
		->subsection_end()
		->subsection("Twtterbar Options")
			->text($ec_themeslug."_blog_twitter", "Enter your Twitter handle", array('default' => 'cyberchimps'))
			->checkbox($ec_themeslug."_blog_twitter_reply", "Show @ Replies", array('default' => true))
		->subsection_end()
		->subsection("Box Options")
			->checkbox($ec_themeslug."_blog_box_title_toggle", "Title", array('default' => true))
			->text($ec_themeslug."_blog_box_title", "Title", array('default' => 'Widgetized Boxes'))
		->subsection_end()
		->subsection("Recent Posts Options")
			->checkbox($ec_themeslug."_blog_recent_posts_title_toggle", "Title")
			->text($ec_themeslug."_blog_recent_posts_title", "Title")
			->select($ec_themeslug.'_blog_recent_posts_category', 'Post Category', array( 'options' => $blogoptions ))
			->checkbox($ec_themeslug."_blog_recent_posts_images_toggle", "Images")
		->subsection_end()
		->subsection("Portfolio Options")
			->upload($ec_themeslug."_blog_portfolio_image_one", "First Portfolio Image", array('default' => array('url' => TEMPLATE_URL . '/images/portfolio.jpg')))
			->text($ec_themeslug."_blog_portfolio_image_one_caption", "First Portfolio Image Caption", array('default' => 'Image 1'))
			->upload($ec_themeslug."_blog_portfolio_image_two", "Second Portfolio Image", array('default' => array('url' => TEMPLATE_URL . '/images/portfolio.jpg')))
			->text($ec_themeslug."_blog_portfolio_image_two_caption", "Second Portfolio Image Caption", array('default' => 'Image 2'))
			->upload($ec_themeslug."_blog_portfolio_image_three", "Third Portfolio Image", array('default' => array('url' => TEMPLATE_URL . '/images/portfolio.jpg')))
			->text($ec_themeslug."_blog_portfolio_image_three_caption", "Third Portfolio Image Caption", array('default' => 'Image 3'))
			->upload($ec_themeslug."_blog_portfolio_image_four", "Fourth Portfolio Image", array('default' => array('url' => TEMPLATE_URL . '/images/portfolio.jpg')))
			->text($ec_themeslug."_blog_portfolio_image_four_caption", "Fourth Portfolio Image Caption", array('default' => 'Image 4'))
			->checkbox($ec_themeslug."_blog_portfolio_title_toggle", "Portfolio Title", array('default' => true))
			->text($ec_themeslug."_blog_portfolio_title", "Title", array('default' => 'Portfolio'))		
		->subsection_end()
		->subsection("SEO")
			->textarea($ec_themeslug."_home_description", "Home Description")
			->textarea($ec_themeslug."_home_keywords", "Home Keywords")
			->text($ec_themeslug."_home_title", "Optional Home Title")
		->subsection_end()
	->section("Templates")
		->subsection("Single Post")
			->images($ec_themeslug."_single_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($ec_themeslug."_single_breadcrumbs", "Breadcrumbs", array('default' => true))
			->checkbox($ec_themeslug."_single_show_featured_images", "Featured Images")
			->checkbox($ec_themeslug."_single_post_formats", "Post Format Icons",  array('default' => true))
			->multicheck($ec_themeslug."_single_hide_byline", "Post Byline Elements", array( 'options' => array($ec_themeslug."_hide_author" => "Author" , $ec_themeslug."_hide_categories" => "Categories", $ec_themeslug."_hide_date" => "Date", $ec_themeslug."_hide_comments" => "Comments",  $ec_themeslug."_hide_tags" => "Tags"), 'default' => array( $ec_themeslug."_hide_tags" => true, $ec_themeslug."_hide_author" => true, $ec_themeslug."_hide_date" => true, $ec_themeslug."_hide_comments" => true, $ec_themeslug."_hide_categories" => true ) ) )
			->checkbox($ec_themeslug."_post_pagination", "Post Pagination Links",  array('default' => true))
		->subsection_end()	
		->subsection("Archive")
			->images($ec_themeslug."_archive_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($ec_themeslug."_archive_breadcrumbs", "Breadcrumbs", array('default' => true))
			->checkbox($ec_themeslug."_archive_show_excerpts", "Post Excerpts", array('default' => true))
			->checkbox($ec_themeslug."_archive_post_formats", "Post Format Icons",  array('default' => true))
			->multicheck($ec_themeslug."_archive_hide_byline", "Post Byline Elements", array( 'options' => array($ec_themeslug."_hide_author" => "Author" , $ec_themeslug."_hide_categories" => "Categories", $ec_themeslug."_hide_date" => "Date", $ec_themeslug."_hide_comments" => "Comments", $ec_themeslug."_hide_tags" => "Tags"), 'default' => array( $ec_themeslug."_hide_tags" => true, $ec_themeslug."_hide_author" => true, $ec_themeslug."_hide_date" => true, $ec_themeslug."_hide_comments" => true, $ec_themeslug."_hide_categories" => true ) ) )
			->subsection_end()
		->subsection("Search")
			->images($ec_themeslug."_search_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($ec_themeslug."_search_show_excerpts", "Post Excerpts", array('default' => true))
		->subsection_end()
		->subsection("404")
			->images($ec_themeslug."_404_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png',"two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))

			->textarea($ec_themeslug."_custom_404", "Custom 404 Content")
		->subsection_end()
	->section("Footer")
		->open_outersection()
			->checkbox($ec_themeslug."_disable_footer", "Footer", array('default' => true))
		->close_outersection()
;
}
