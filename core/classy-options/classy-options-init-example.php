<?php
/**
* Sample Theme Options Init Page
*
* Author: Tyler Cunningham
* Copyright: &#169; 2011
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package Core
* @since 1.0
*/

require( get_template_directory() . '/core/classy-options/classy-options-framework/classy-options-framework.php');

add_action('init', 'chimps_init_options');

function chimps_init_options() {

global $options, $ec_themeslug, $ec_themename, $ec_themenamefull;
$options = new ClassyOptions($ec_themename, $ec_themenamefull." Options");

$carouselterms2 = get_terms('carousel_categories', 'hide_empty=0');

	$customcarousel = array();
                                    
    	foreach($carouselterms2 as $carouselterm) {

        	$customcarousel[$carouselterm->slug] = $carouselterm->name;

        }

$customterms2 = get_terms('slide_categories', 'hide_empty=0');

	$customslider = array();
                                    
    	foreach($customterms2 as $customterm) {

        	$customslider[$customterm->slug] = $customterm->name;

        }

$terms2 = get_terms('category', 'hide_empty=0');

	$blogoptions = array();
                                    
	$blogoptions['all'] = "All";

    	foreach($terms2 as $term) {

        	$blogoptions[$term->slug] = $term->name;

        }


$options
		->section("Header")
		->open_outersection()
		->checkbox($ec_themeslug."_disable_header", "Toggle to show the header", array('default' => true))
		->close_outersection()
		->subsection("Header Options")
			->upload($ec_themeslug."_logo", "Custom Logo")
			->checkbox($ec_themeslug."_enable_header_contact", "Header Contact Area")
			->textarea($ec_themeslug."_header_contact", "Enter Your Information")
			->checkbox($ec_themeslug."_show_description", "Site Description")
			->text($ec_themeslug."_icon_margin", "Social Icon Margin Top", array('default' => '10px'))
			->upload($ec_themeslug."_favicon", "Custom Favicon")
			->checkbox($ec_themeslug."_disable_breadcrumbs", "Breadcrumbs", array('default' => true))
		->subsection_end()
		->subsection("iMenu Options")
			->select($ec_themeslug."_menu_font", "Choose a Menu Font", array( 'options' => array("Arial" => "Arial (default)", "Courier New" => "Courier New", "Georgia" => "Georgia", "Helvetica" => "Helvetica", "Lucida Grande" => "Lucida Grande", "Tahoma" => "Tahoma", "Times New Roman" => "Times New Roman", "Verdana" => "Verdana", "Actor" => "Actor", "Coda" => "Coda", "Maven+Pro" => "Maven Pro", "Metrophobic" => "Metrophobic", "News+Cycle" => "News Cycle", "Nobile" => "Nobile", "Tenor+Sans" => "Tenor Sans", "Quicksand" => "Quicksand", "Ubuntu" => "Ubuntu", 'custom' => "Custom")))
			->text($ec_themeslug."_custom_menu_font", "Enter a Custom Menu Font")
			->color($ec_themeslug."_custom_menu_color", "Custom Menu Color")
			->checkbox($ec_themeslug."_hide_home_icon", "Home Icon", array('default' => true))
			->checkbox($ec_themeslug."_hide_search", "Searchbar", array('default' => true))
		
		->subsection_end()
		->subsection("Social")
			->images($ec_themeslug."_icon_style", "Icon set", array( 'options' => array( 'round' => TEMPLATE_URL . '/images/social/thumbs/icons-round.png', 'legacy' => TEMPLATE_URL . '/images/social/thumbs/icons-classic.png', 'default' =>
TEMPLATE_URL . '/images/social/thumbs/icons-default.png' ), 'default' => 'default' ) )
			->text($ec_themeslug."_twitter", "Twitter Icon URL", array('default' => 'http://twitter.com'))
			->checkbox($ec_themeslug."_hide_twitter", "Hide Twitter Icon", array('default' => true))
			->text($ec_themeslug."_facebook", "Facebook Icon URL", array('default' => 'http://facebook.com'))
			->checkbox($ec_themeslug."_hide_facebook", "Hide Facebook Icon" , array('default' => true))
			->text($ec_themeslug."_gplus", "Google + Icon URL", array('default' => 'http://plus.google.com'))
			->checkbox($ec_themeslug."_hide_gplus", "Hide Google + Icon" , array('default' => true))
			->text($ec_themeslug."_flickr", "Flickr Icon URL", array('default' => 'http://flikr.com'))
			->checkbox($ec_themeslug."_hide_flickr", "Hide Flickr Icon")
			->text($ec_themeslug."_linkedin", "LinkedIn Icon URL", array('default' => 'http://linkedin.com'))
			->checkbox($ec_themeslug."_hide_linkedin", "Hide LinkedIn Icon")
			->text($ec_themeslug."_youtube", "YouTube Icon URL", array('default' => 'http://youtube.com'))
			->checkbox($ec_themeslug."_hide_youtube", "Hide YouTube Icon")
			->text($ec_themeslug."_googlemaps", "Google Maps Icon URL", array('default' => 'http://maps.google.com'))
			->checkbox($ec_themeslug."_hide_googlemaps", "Hide Google maps Icon")
			->text($ec_themeslug."_email", "Email Address")
			->checkbox($ec_themeslug."_hide_email", "Hide Email Icon")
			->text($ec_themeslug."_rsslink", "RSS Icon URL")
			->checkbox($ec_themeslug."_hide_rss", "Hide RSS Icon" , array('default' => true))
		->subsection_end()
		->subsection("Tracking")
			->textarea($ec_themeslug."_ga_code", "Google Analytics Code")
		->subsection_end()
	->section("Blog")
		->subsection("Blog Options")
			->images($ec_themeslug."_blog_sidebar", "Select the Sidebar Type", array( 'options' => array("two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "none" => TEMPLATE_URL . '/images/options/none.png', "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($ec_themeslug."_post_formats", "Post Format Icons",  array('default' => true))
			->checkbox($ec_themeslug."_show_excerpts", "Post Excerpts")
			->text($ec_themeslug."_excerpt_link_text", "Excerpt Link Text", array('default' => '(More)&#8230;'))
			->text($ec_themeslug."_excerpt_length", "Excerpt Character Length", array('default' => '55'))
			->checkbox($ec_themeslug."_show_featured_images", "Featured Images")
			->select($ec_themeslug."_featured_image_align", "Featured Image Alignment", array( 'options' => array("key1" => "Left", "key2" => "Center", "key3" => "Right")))
			->text($ec_themeslug."_featured_image_height", "Featured Image Height", array('default' => '100'))
			->text($ec_themeslug."_featured_image_width", "Featured Image Width", array('default' => '100'))
			->checkbox($ec_themeslug."_show_carousel", "Featured Post Carousel")
			->select($ec_themeslug.'_carousel_category', 'Select the carousel category', array( 'options' => $customcarousel ))
			->multicheck($ec_themeslug."_hide_byline", "Post Byline Elements", array( 'options' => array($ec_themeslug."_hide_author" => "Author" , $ec_themeslug."_hide_categories" => "Categories", $ec_themeslug."_hide_date" => "Date", $ec_themeslug."_hide_comments" => "Comments", $ec_themeslug."_hide_share" => "Share", $ec_themeslug."_hide_tags" => "Tags"), 'default' => array( $ec_themeslug."_hide_tags" => true, $ec_themeslug."_hide_share" => true, $ec_themeslug."_hide_author" => true, $ec_themeslug."_hide_date" => true, $ec_themeslug."_hide_comments" => true, $ec_themeslug."_hide_categories" => true ) ) )
			->checkbox($ec_themeslug."_show_fb_like", "Facebook Like Button")
			->checkbox($ec_themeslug."_show_gplus", "Google Plus One Button")
			->checkbox($ec_themeslug."_post_pagination", "Post Pagination Links",  array('default' => true))
		->subsection_end()->subsection("Blog Slider")
			->checkbox($ec_themeslug."_hide_slider_blog", "Index iFeature Slider", array('default' => true))
			->select($ec_themeslug."_slider_size", "Select the Slider Size", array( 'options' => array("key1" => "half", "key2" => "full")))
			->select($ec_themeslug."_slider_type", "Select the Slider Type", array( 'options' => array("posts" => "posts", "custom" => "custom")))
			->select($ec_themeslug.'_slider_category', 'Select the post category', array( 'options' => $blogoptions ))
			->select($ec_themeslug.'_customslider_category', 'Select the custom slide category', array( 'options' => $customslider ))
			->text($ec_themeslug."_slider_posts_number", "Number of Featured Blog Posts")
			->text($ec_themeslug."_slider_height", "Slider height")
			->text($ec_themeslug."_slider_delay", "Slider Delay")
			->select($ec_themeslug."_caption_style", "Select the Caption Style", array( 'options' => array("key1" => "Bottom", "key2" => "Right", "key3" => "Left", "key4" => "None")))
			->select($ec_themeslug."_slider_animation", "Select the Sidebar Animation", array( 'options' => array("key1" => "Random", "key2" => "sliceDown", "key3" => "sliceDownLeft", "key4" => "sliceUp", "key5" => "sliceUpLeft", "key6" => "sliceUpDown", "key7" => "sliceUpDownLeft", "key8" => "fold", "key9" => "fade", "key10" => "slideInRight", "key11" => "slideInLeft", "key12" => "boxRandom", "key13" => "boxRain", "key14" => "boxRainReverse", "key15" => "boxRainGrow", "key16" => "boxRainGrowReverse",)))
			->select($ec_themeslug."_slider_nav", "Select the Slider Navigation", array( 'options' => array("key1" => "Dots", "key2" => "Thumbnails", "key3" => "none")))
			->checkbox($ec_themeslug."_hide_slider_arrows", "Slider Arrows", array('default' => true))
			->checkbox($ec_themeslug."_disable_nav_autohide", "Slider Arrow Auto-Hide", array('default' => true))
			->checkbox($ec_themeslug."_enable_wordthumb", "WordThumb Image Resizing")
		->subsection_end()->subsection("SEO")
			->textarea($ec_themeslug."_home_description", "Home Description")
			->textarea($ec_themeslug."_home_keywords", "Home Keywords")
			->text($ec_themeslug."_home_title", "Optional Home Title")
		->subsection_end()
	->section("Footer")
		->open_outersection()
			->checkbox($ec_themeslug."_disable_footer", "Toggle to enable the footer", array('default' => true))
			->text($ec_themeslug."_footer_text", "Footer Copyright Text")
			->checkbox($ec_themeslug."_hide_link", "CyberChimps Link", array('default' => true))
			->checkbox($ec_themeslug."_disable_afterfooter", "Toggle to enable the afterfooter", array('default' => true))
		->close_outersection()
	->section("Import / Export")
		->open_outersection()
			->export("Export Settings")
			->import("Import Settings")
		->close_outersection()
;
}
