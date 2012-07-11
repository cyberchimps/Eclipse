<?php
/**
* Global actions used by response.
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
* response global actions
*/

add_action( 'response_loop', 'response_loop_content' );
add_action( 'response_post_byline', 'response_post_byline_content' );
add_action( 'response_mobile_post_byline', 'response_mobile_post_byline_content' );
add_action( 'response_edit_link', 'response_edit_link_content' );
add_action( 'response_post_tags', 'response_post_tags_content' );
add_action( 'response_post_bar', 'response_post_bar_content' );
add_action( 'response_fb_like_plus_one', 'response_fb_like_plus_one_content' );

/**
* Check for post format type, apply filter based on post format name for easy modification.
*
* @since 1.0
*/
function response_loop_content($content) { 

	global $options, $ec_themeslug, $post; //call globals
	
	if (is_single()) {
		 $post_formats = $options->get($ec_themeslug.'_single_post_formats');
		 $featured_images = $options->get($ec_themeslug.'_single_show_featured_images');
		 $excerpts = $options->get($ec_themeslug.'_single_show_excerpts');
	}
	elseif (is_archive()) {
		 $post_formats = $options->get($ec_themeslug.'_archive_post_formats');
		 $featured_images = $options->get($ec_themeslug.'_archive_show_featured_images');
		 $excerpts = $options->get($ec_themeslug.'_archive_show_excerpts');
	}
	else {
		 $post_formats = $options->get($ec_themeslug.'_post_formats');
		 $featured_images = $options->get($ec_themeslug.'_show_featured_images');
		 $excerpts = $options->get($ec_themeslug.'_show_excerpts');
	}
	
	if (get_post_format() == '') {
		$format = "default";
	}
	else {
		$format = get_post_format();
	} ?>
	<?php ob_start(); ?>
			
			<!--Call @response Meta hook-->
			<div class="row">
			<div class="byline three columns"><?php response_post_byline(); ?></div>
				<div class="entry nine columns">
					<h2 class="posts_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					
					<?php
				if ( has_post_thumbnail() && $featured_images == '1' ) {
 		 			echo '<div class="featured-image">';
 		 			echo '<a href="' . get_permalink($post->ID) . '" >';
 		 				the_post_thumbnail();
  					echo '</a>';
  					echo '</div>';
				}
			?>	
			<?php response_mobile_post_byline(); ?>
					<?php 
						if ($excerpts == '1' && !is_single() ) {
						the_excerpt();
						}
						else {
							the_content(__('<img class="continue_img" src="' .get_bloginfo('template_directory'). '/images/continue.png"> Continue Reading', 'response'));
						}
					 ?>
					 <div class='clear'>&nbsp;</div>
				<!--Begin @response link pages hook-->
					<?php response_link_pages(); ?>
				<!--End @response link pages hook-->
			
				<!--Begin @response post edit link hook-->
					<?php response_edit_link(); ?>
				<!--End @response post edit link hook-->
				</div><!--end entry-->
			</div><!--end row-->
			<?php	
		
		$content = ob_get_clean();
		$content = apply_filters( 'response_post_formats_'.$format.'_content', $content );
	
		echo $content; 
}

/**
* Sets the post byline information (author, date, category). 
*
* @since 1.0
*/
function response_post_byline_content() {
	global $options, $ec_themeslug; //call globals.  
	if (is_single()) {
		$hidden = $options->get($ec_themeslug.'_single_hide_byline'); 
		 $post_formats = $options->get($ec_themeslug.'_single_post_formats');
	}
	elseif (is_archive()) {
		$hidden = $options->get($ec_themeslug.'_archive_hide_byline'); 
		 $post_formats = $options->get($ec_themeslug.'_archive_post_formats');
	}
	else {
		$hidden = $options->get($ec_themeslug.'_hide_byline'); 
		$post_formats = $options->get($ec_themeslug.'_post_formats');
	}
	if (get_post_format() == '') {
		$format = "default";
	}
	else {
		$format = get_post_format();
	}?>
	
	<?php if ($post_formats != '0') : ?>
		<div class="postformats hide-on-phones"><!--begin format icon-->
			<img src="<?php echo get_template_directory_uri(); ?>/images/formats/<?php echo $format ;?>.png" alt="formats" />
		</div><!--end format-icon-->
	<?php endif; ?>
	<div class="meta hide-on-phones">
	<ul>
		<li class="metadate"><?php if (($hidden[$ec_themeslug.'_hide_date']) != '0'):?><?php printf( __( '', 'response' )); ?><a href="<?php the_permalink() ?>"><?php echo get_the_date(); ?></a><?php endif;?></li>
		<li class="metacomments"><?php if (($hidden[$ec_themeslug.'_hide_comments']) != '0'):?><?php comments_popup_link( __('No Comments', 'response' ), __('1 Comment', 'response' ), __('% Comments' , 'response' )); //need a filer here ?><?php endif;?></li>
		<li class="metaauthor"><?php if (($hidden[$ec_themeslug.'_hide_author']) != '0'):?><?php printf( __( '', 'response' )); ?><?php the_author_posts_link(); ?><?php endif;?></li>
		<li class="metacat"><?php if (($hidden[$ec_themeslug.'_hide_categories']) != '0'):?><?php printf( __( '', 'response' )); ?> <?php the_category(', ') ?><?php endif;?></li>
		<li class="metatags"><?php response_post_tags(); ?></li>
	</ul>
	</div> <?php
}

/**
* Sets the responsive post byline information (author, date, category). 
*
* @since 1.0
*/
function response_mobile_post_byline_content() {
	global $options, $ec_themeslug; //call globals.  
	if (is_single()) {
		$hidden = $options->get($ec_themeslug.'_single_hide_byline'); 
		 $post_formats = $options->get($ec_themeslug.'_single_post_formats');
	}
	elseif (is_archive()) {
		$hidden = $options->get($ec_themeslug.'_archive_hide_byline'); 
		 $post_formats = $options->get($ec_themeslug.'_archive_post_formats');
	}
	else {
		$hidden = $options->get($ec_themeslug.'_hide_byline'); 
		$post_formats = $options->get($ec_themeslug.'_post_formats');
	}
	if (get_post_format() == '') {
		$format = "default";
	}
	else {
		$format = get_post_format();
	}?>
	
		<div class="meta-mobile show-on-phones">
	<ul><?php if ($post_formats != '0') : ?>
		<li class="postformats show-on-phones"><img src="<?php echo get_template_directory_uri(); ?>/images/formats/<?php echo $format ;?>.png" alt="formats" />
</li><?php endif; ?>
		<li class="metadate"><?php if (($hidden[$ec_themeslug.'_hide_date']) != '0'):?><?php printf( __( '', 'response' )); ?><a href="<?php the_permalink() ?>"><?php echo get_the_date(); ?></a><?php endif;?></li>
		<li class="metacomments"><?php if (($hidden[$ec_themeslug.'_hide_comments']) != '0'):?><?php comments_popup_link( __('No Comments', 'response' ), __('1 Comment', 'response' ), __('% Comments' , 'response' )); //need a filer here ?><?php endif;?></li>
		<li class="metaauthor"><?php if (($hidden[$ec_themeslug.'_hide_author']) != '0'):?><?php printf( __( '', 'response' )); ?><?php the_author_posts_link(); ?><?php endif;?></li>
		<li class="metacat"><?php if (($hidden[$ec_themeslug.'_hide_categories']) != '0'):?><?php printf( __( '', 'response' )); ?> <?php the_category(', ') ?><?php endif;?></li>
		<li class="metatags"><?php response_post_tags(); ?></li>
	</ul>
	</div> <?php
}


/**
* Sets up the WP edit link
*
* @since 1.0
*/
function response_edit_link_content() {
	edit_post_link('Edit', '<p>', '</p>');
}

/**
* Sets up the tag area
*
* @since 1.0
*/
function response_post_tags_content() {
	global $options, $ec_themeslug; 
	if (is_single()) {
		$hidden = $options->get($ec_themeslug.'_single_hide_byline'); 
	}
	elseif (is_archive()) {
		$hidden = $options->get($ec_themeslug.'_archive_hide_byline'); 
	}
	else {
		$hidden = $options->get($ec_themeslug.'_hide_byline'); 
	}?>

	<?php if (has_tag() AND ($hidden[$ec_themeslug.'_hide_tags']) != '0'):?>
			<?php the_tags('', ', ', ''); ?>
	<?php endif;
}

/**
* End
*/

?>