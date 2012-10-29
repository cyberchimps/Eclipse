<?php
/**
* Functions related to the Eclipse Theme Options.
*
* Author: Tyler Cunningham
* Copyright: © 2012
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package Eclipse
* @since 1.0
*/

function eclipse_content_layout() {
	global $options, $ec_themeslug, $post;
	
	if (is_single()) {
	$sidebar = $options->get($ec_themeslug.'_single_sidebar');
	}
	elseif (is_archive()) {
	$sidebar = $options->get($ec_themeslug.'_archive_sidebar');
	}
	elseif (is_404()) {
	$sidebar = $options->get($ec_themeslug.'_404_sidebar');
	}
	elseif (is_search()) {
	$sidebar = $options->get($ec_themeslug.'_search_sidebar');
	}
	elseif (is_page()) {
	$sidebar = get_post_meta($post->ID, 'page_sidebar' , true);
	}
	else {
	$sidebar = $options->get($ec_themeslug.'_blog_sidebar');
	}
	
	if ($sidebar == 'two-right' OR $sidebar == '3' ) {
		echo '<style type="text/css">';
		echo "#content.six.columns {width: 52.8%;  margin-right: 2%}";
		echo "#content.six.columns {width: 52.8%;  margin-right: 1.9%\9;}";
		echo "#sidebar-right.three.columns {margin-left: 0%; width: 21.68%;}";
		echo "#sidebar-left.three.columns {margin-left: 0%; width: 21.68%; margin-right:2%}";
		echo "#sidebar-left.three.columns {margin-left: 0%; width: 21.68%; margin-right:1.9%\9;}";
		echo "@-moz-document url-prefix() {#content.six.columns {width: 52.8%;  margin-right: 1.9%} #sidebar-left.three.columns {margin-left: 0%; width: 21.68%; margin-right:1.9%}}";
		echo '</style>';
	}
	if ($sidebar == 'right-left' OR $sidebar == '2' ) {
		echo '<style type="text/css">';
		echo "#content.six.columns {width: 52.8%; margin-left: 2%; margin-right: 2%}";
		echo "#content.six.columns {width: 52.8%; margin-left: 1.9%\9; margin-right: 1.9%\9;}";
		echo "#sidebar-right.three.columns {margin-left: 0%; width: 21.68%;}";
		echo "#sidebar-left.three.columns {margin-left: 0%; width: 21.68%;}";
		echo "@-moz-document url-prefix() {#content.six.columns {width: 52.8%; margin-left: 1.9%; margin-right: 1.9%}}";
		echo '</style>';
	}

}
add_action( 'wp_head', 'eclipse_content_Layout' );

/* Site Title Color */

function eclipse_add_text_color() {

	global $ec_themename, $ec_themeslug, $options;

	if ($options->get($ec_themeslug.'_text_color') != "") {
		$textcolor = $options->get($ec_themeslug.'_text_color'); 
		echo '<style type="text/css">';
		echo "body {color: $textcolor;}";
		echo '</style>';
	}
}
add_action( 'wp_head', 'eclipse_add_text_color');

/* Link Color */

function eclipse_add_link_color() {

	global $ec_themename, $ec_themeslug, $options;

	if ($options->get($ec_themeslug.'_link_color') != '') {
		$link = $options->get($ec_themeslug.'_link_color'); 
		echo '<style type="text/css">';
		echo "a {color: $link;}";
		echo ".meta a {color: $link;}";
		echo '</style>';
	}
}
add_action( 'wp_head', 'eclipse_add_link_color');

/* Link Hover Color */

function eclipse_add_link_hover_color() {

	global $ec_themename, $ec_themeslug, $options;

	if ($options->get($ec_themeslug.'_link_hover_color') != '') {
		$link = $options->get($ec_themeslug.'_link_hover_color'); 
		echo '<style type="text/css">';
		echo "a:hover {color: $link;}";
		echo ".meta a:hover {color: $link;}";
		echo '</style>';
	}
}
add_action( 'wp_head', 'eclipse_add_link_hover_color');

/* Menu Font */
 
function eclipse_add_menu_font() {
		
	global $ec_themename, $ec_themeslug, $options;	
		
	if ($options->get($ec_themeslug.'_menu_font') == "") {
		$font = 'Helvetica';
	}		
			
	else {
		$font = $options->get($ec_themeslug.'_menu_font'); 
	}
	
		$fontstrip =  ereg_replace("[^A-Za-z0-9]", " ", $font );
		
		// register font stylesheet
		if( $font == 'Actor' ||
			$font == 'Coda' ||
			$font == 'Maven Pro' ||
			$font == 'Metrophobic' ||
			$font == 'News Cycle' ||
			$font == 'Nobile' ||
			$font == 'Tenor Sans' ||
			$font == 'Quicksand' ||
			$font == 'Ubuntu') {
			echo "<link href='http://fonts.googleapis.com/css?family=$font' rel='stylesheet' type='text/css' />";
		}
		
		echo '<style type="text/css">';
		echo "#nav ul li a {font-family: $fontstrip;}";
		echo '</style>';
}
add_action( 'wp_head', 'eclipse_add_menu_font'); 

/* Menu Font */
 
function eclipse_add_secondary_font() {
		
	global $ec_themename, $ec_themeslug, $options;	
		
	if ($options->get($ec_themeslug.'_secondary_font') == "") {
		$font = 'Open Sans';
	}		
			
	else {
		$font = $options->get($ec_themeslug.'_secondary_font'); 
	}
	
		$fontstrip =  ereg_replace("[^A-Za-z0-9]", " ", $font );
		
		// register font stylesheet
		if( $font == 'Actor' ||
			$font == 'Coda' ||
			$font == 'Maven Pro' ||
			$font == 'Metrophobic' ||
			$font == 'News Cycle' ||
			$font == 'Nobile' ||
			$font == 'Tenor Sans' ||
			$font == 'Quicksand' ||
			$font == 'Ubuntu') {
			echo "<link href='http://fonts.googleapis.com/css?family=$font' rel='stylesheet' type='text/css' />";
		}
		
		echo '<style type="text/css">';
		echo "#twittertext, #callout_text, .posts_title a, .sitename, .widget-title {font-family: '$fontstrip', sans-serif;}";
		echo '</style>';
}
add_action( 'wp_head', 'eclipse_add_secondary_font'); 

?>