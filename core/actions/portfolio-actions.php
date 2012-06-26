<?php
/**
* Portfolio element actions used by response Pro.
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
* @package response Pro
* @since 1.0
*/

/**
* response Portfolio Section actions
*/
add_action( 'response_portfolio_element', 'response_portfolio_element_content' );

function response_portfolio_element_content() {	
	global $options, $post, $ec_themeslug, $ec_root, $wp_query;
	$tmp_query = $wp_query; 
	$image = get_post_meta($post->ID, 'portfolio_image' , true);
	
	if (is_page()) {
		$title_enable = get_post_meta($post->ID, $ec_themeslug.'_portfolio_title_toggle' , true);
		$title = get_post_meta($post->ID, $ec_themeslug.'_portfolio_title' , true);
	
		$img1 = get_post_meta($post->ID, $ec_themeslug.'_page_portfolio_image_one' , true);
		$img2 = get_post_meta($post->ID, $ec_themeslug.'_page_portfolio_image_two' , true);
		$img3 = get_post_meta($post->ID, $ec_themeslug.'_page_portfolio_image_three' , true);
		$img4 = get_post_meta($post->ID, $ec_themeslug.'_page_portfolio_image_four' , true);
	
		$caption1 = get_post_meta($post->ID, $ec_themeslug.'_page_portfolio_image_one_caption' , true);
		$caption2 = get_post_meta($post->ID, $ec_themeslug.'_page_portfolio_image_two_caption' , true);
		$caption3 = get_post_meta($post->ID, $ec_themeslug.'_page_portfolio_image_three_caption' , true);
		$caption4 = get_post_meta($post->ID, $ec_themeslug.'_page_portfolio_image_four_caption' , true);
	}
	else {
		$title_enable = $options->get($ec_themeslug.'_blog_portfolio_title_toggle');
		$title = $options->get($ec_themeslug.'_blog_portfolio_title');

		$img1source = $options->get($ec_themeslug.'_blog_portfolio_image_one');
		$img2source = $options->get($ec_themeslug.'_blog_portfolio_image_two');
		$img3source = $options->get($ec_themeslug.'_blog_portfolio_image_three');
		$img4source = $options->get($ec_themeslug.'_blog_portfolio_image_four');
		
		$img1 = $img1source['url'];
		$img2 = $img2source['url'];
		$img3 = $img3source['url'];
		$img4 = $img4source['url'];
	
		$caption1 = $options->get($ec_themeslug.'_blog_portfolio_image_one_caption');
		$caption2 = $options->get($ec_themeslug.'_blog_portfolio_image_two_caption');
		$caption3 = $options->get($ec_themeslug.'_blog_portfolio_image_three_caption');
		$caption4 = $options->get($ec_themeslug.'_blog_portfolio_image_four_caption');
	}

	$title = ($title != '') ? $title : 'Portfolio';	
	$title_output = ($title_enable == 'on' OR $title_enable == '1') ? "<h1 class='portfolio_title'>$title</h1>" : '';
	?>

<div id="portfolio" class="container">
	<div class="row">
		
	<?php
	    	/* Post-specific variables */	
	    	$image = get_post_meta($post->ID, 'portfolio_image' , true);
	    	$title = get_the_title() ;	    	
	?>
	    			<div id='gallery' class='twelve columns'><?php echo $title_output; ?><ul>
					<li id='portfolio_wrap' class='three columns'>
	    				<a href='<?php echo $img1 ;?>' rel="lightbox-portfolio" title='<?php echo $caption1 ;?>'><img src='<?php echo $img1 ;?>'  alt='Image 1'/>
	    					<div class='portfolio_caption'><?php echo $caption1 ;?></div>
	    				</a>
	    			</li>
	    		
	  	    		<li id='portfolio_wrap' class='three columns'>
	    				<a href='<?php echo $img2 ;?>' rel="lightbox-portfolio" title='<?php echo $caption2 ;?>'><img src='<?php echo $img2 ;?>'  alt='Image 1'/>
	    					<div class='portfolio_caption'><?php echo $caption2 ;?></div>
	    				</a>
	    			</li>
	    		
					<li id='portfolio_wrap' class='three columns'>
	    				<a href='<?php echo $img3 ;?>' rel="lightbox-portfolio" title='<?php echo $caption3 ;?>'><img src='<?php echo $img3 ;?>'  alt='Image 1'/>
	    					<div class='portfolio_caption'><?php echo $caption3 ;?></div>
	    				</a>
	    			</li>
	    			
	    			<li id='portfolio_wrap' class='three columns'>
	    				<a href='<?php echo $img4 ;?>' rel="lightbox-portfolio" title='<?php echo $caption4 ;?>'><img src='<?php echo $img4 ;?>'  alt='Image 1'/>
	    					<div class='portfolio_caption'><?php echo $caption4 ;?></div>
	    				</a>
	    			</li>
	    			</ul></div>


<?php

/* END */ 
?>
	
	</div>
</div>

<?php
}
?>