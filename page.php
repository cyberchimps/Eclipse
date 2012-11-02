<?php 
/**
* Page template used by Eclipse.
*
* Authors: Tyler Cunningham, Trent Lapinski
* Copyright: © 2012
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package Eclipse.
* @since 1.0
*/

/* Header call. */

	get_header(); 
	
/* End header. */	

/* Define global variables. */
	global $options, $post, $ec_themeslug, $sidebar;
	
	$page_section_order = get_post_meta($post->ID, $ec_themeslug.'_page_section_order' , true);
	if(!$page_section_order) {
		$page_section_order = 'page_section';
	}
	
/* End define global variables. */

	// Checking for password protection.
	if( ! post_password_required() ) {
		foreach(explode(",", $page_section_order) as $key) {
			$fn = 'response_' . $key;
			if(function_exists($fn)) {
			call_user_func_array($fn, array());
			}
		}
	}
	else {
	?>
		<!-- Get the form to submit password -->
		<div class="row">
			<div id="content" class="eight columns">
				<div class="post_container">
					<?php echo get_the_password_form(); ?>
				</div>
			</div>
		</div>
	<?php
	}

get_footer();
?>