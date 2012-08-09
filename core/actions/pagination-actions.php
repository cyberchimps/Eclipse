<?php
/**
* Pagination actions used by response.
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
* @package response
* @since 1.0
*/

/**
* response pagination actions
*/
add_action('response_pagination', 'response_previous_posts');
add_action('response_pagination', 'response_newer_posts');
add_action('response_link_pages', 'response_link_pages_content');
add_action('response_post_pagination', 'response_post_pagination_content');

/**
* Sets up the previous post link and applies a filter to the link text.
*
* @since 1.0
*/
function response_previous_posts() {
	$previous_text = apply_filters('response_previous_posts_text', '&laquo; Older Entries' ); 
	
	echo "<div class='pagnext-posts'>";
	next_posts_link( $previous_text );
	echo "</div>";
}

/**
* Sets up the next post link and applies a filter to the link text. 
*
* @since 1.0
*/
function response_newer_posts() {
	$newer_text = apply_filters('response_newer_posts_text', 'Newer Entries &raquo;' );
	
	echo "<div class='pagprev-posts'>";
	previous_posts_link( $newer_text );
	echo "</div>";
}

/**
* Sets up the WP link pages
*
* @since 1.0
*/
function response_link_pages_content() {
	 wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number'));
}

/**
* Post pagination links 
*
* @since 1.0
*/
function response_post_pagination_content() {
	global $options, $ec_themeslug, $ec_root?>
	
	<?php if ($options->get($ec_themeslug.'_post_pagination') != "0"):?>
	<div id="post-pagination-container">
		<div id="post-pagination-wrap">
			<div class="prev-posts-single"><img src="<?php echo "$ec_root/images/previouspost.png";?>"><?php previous_post_link('%link'); ?></div> 
			<div class="next-posts-single"><?php next_post_link('%link'); ?><img src="<?php echo "$ec_root/images/nextpost.png";?>"></div>
		</div>
	</div>
	<?php endif; 
}

/**
* End
*/

?>