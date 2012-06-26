<?php
/**
* Index actions used by response.
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
* response post actions
*/

add_action( 'response_post', 'response_post_content');

/**
* Index content
*
* @since 1.0
*/
function response_post_content() { 

	global $options, $ec_themeslug, $post, $sidebar, $content_grid; // call globals 
	
	if (is_single()) {
		$class = 'single';
	}
	elseif (is_archive()) {
		$class = 'archive';
	}
	else {
		$class = '';
	}
	
	?>
	
	<!--Begin @response sidebar init-->
		<?php response_sidebar_init(); ?>
	<!--End @response sidebar init-->
	<div class="container">
	<div class="row">
	<!--Begin @response before content sidebar hook-->
		<?php response_before_content_sidebar(); ?>
	<!--End @response before content sidebar hook-->

		<div id="content" class="<?php echo $content_grid; ?>">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<div class="post_container <?php echo $class; ?>">
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		
				<!--Begin @response index loop hook-->
					<?php response_loop(); ?>
				<!--End @response index loop hook-->
							
				</div><!--end post_class-->
			</div><!--end post container-->
			
			<?php if (is_attachment()) : ?>
			
			<div id="image_pagination">
				<div class="image_wrap">
					<div class="previous_image"> <?php previous_image_link( array( 100, 1000 ) ); ?></div>
					<div class="next_image"><?php next_image_link( array( 100, 100 )); ?></div>
				</div>
			</div>
			<?php endif; ?>
			
			<?php if (is_single() && $options->get($ec_themeslug.'_post_pagination') == "1") : ?>
				<!--Begin @response post pagination hook-->
					<?php response_post_pagination(); ?>
				<!--End @response post pagination hook-->			
				<?php endif;?>
			
			<?php if (is_single()):?>
				<?php comments_template(); ?>
			<?php endif ?>
			
			<?php endwhile; ?>
		
			<?php else : ?>

				<h2>Not Found</h2>

			<?php endif; ?>
			
			<!--Begin @response pagination hook-->
			<?php response_custom_pagination(); ?>
			<!--End @response pagination loop hook-->
		
		</div><!--end row-->
		
	<!--Begin @response after content sidebar hook-->
		<?php response_after_content_sidebar(); ?>
	<!--End @response after content sidebar hook-->
	</div><!--end container-->

</div>
<?php }

/**
* End
*/

?>