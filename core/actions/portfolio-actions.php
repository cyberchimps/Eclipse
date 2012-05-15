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
	global $options, $post, $themeslug, $root, $wp_query;
	$tmp_query = $wp_query; 
	$image = get_post_meta($post->ID, 'portfolio_image' , true);

	if (is_page()){
		$category = get_post_meta($post->ID, 'portfolio_category' , true);
		$num = get_post_meta($post->ID, 'portfolio_row_number' , true);
		$title_enable = get_post_meta($post->ID, 'portfolio_title_toggle' , true);
		$title = get_post_meta($post->ID, 'portfolio_title' , true);;
	} else {
		$category = $options->get($themeslug.'_portfolio_category');
		$num = $options->get($themeslug.'_portfolio_number');
		$title_enable = $options->get($themeslug.'_portfolio_title_toggle');
		$title = $options->get($themeslug.'_portfolio_title');
	}

	if ($num == '1' OR $num == 'key2') {
		$number = 'four';
		$numb = '3';
	} else if ($num == '2' OR $num == 'key3') {
		$number = 'six';
		$numb = '2';
	} else {
		$number = 'three';
		$numb = '4';
	}

	$title = ($title != '') ? $title : 'Portfolio';	
	$title_output = ($title_enable == 'on' OR $title_enable == '1') ? "<h1 class='portfolio_title'>$title</h1>" : '';
	?>

<div id="portfolio" class="container">
	<div class="row">
		
	<?php query_posts( array ('post_type' => $themeslug.'_portfolio_images', 'portfolio_categories' => $category ));

	if (have_posts()) :
		$out = " <div id='gallery' class='twelve columns'>$title_output<ul>"; 

		$counter = 1;

		while (have_posts()) : the_post();

			$class = ( $counter % $numb == 1 ) ? 'first-row' : '';

	    	/* Post-specific variables */	
	    	$image = get_post_meta($post->ID, 'portfolio_image' , true);
	    	$title = get_the_title() ;	    	

	     	/* Markup for portfolio */
	    	$out .= "
				<li id='portfolio_wrap' class='$number columns $class'>
	    			<a href='$image' title='$title'><img src='$image'  alt='$title'/>
	    				<div class='portfolio_caption'>$title</div>
	    			</a>	
	  	    	</li>
	    			";

	    	/* End slide markup */	

	      	$counter++;
	      	endwhile;
	      	$out .= "</ul></div>";	 

	      	else:

	      	$out .= "	
	    		<div id='gallery' class='twelve columns'><ul>
	      			<li id='portfolio_wrap' class='three columns'>
	    				<a href='$root/images/pro/portfolio.jpg' title='Image 1'><img src='$root/images/pro/portfolio.jpg'  alt='Image 1'/>
	    					<div class='portfolio_caption'>Image 1</div>
	    				</a>
	    			</li>
	    		
	  	    		<li id='portfolio_wrap' class='three columns'>
	    				<a href='$root/images/pro/portfolio.jpg' title='Image 2'><img src='$root/images/pro/portfolio.jpg'  alt='Image 2'/>
	    					<div class='portfolio_caption'>Image 2</div>
	    				</a>
	    			</li>
	    		
					<li id='portfolio_wrap' class='three columns'>
	    				<a href='$root/images/pro/portfolio.jpg' title='Image 3'><img src='$root/images/pro/portfolio.jpg'  alt='Image 3'/>
	    					<div class='portfolio_caption'>Image 3</div>
	    				</a>
	    			</li>
	    			<li id='portfolio_wrap' class='three columns'>
	    				<a href='$root/images/pro/portfolio.jpg' title='Image 3'><img src='$root/images/pro/portfolio.jpg'  alt='Image 3'/>
	    					<div class='portfolio_caption'>Image 3</div>
	    				</a>
	    			</li>
	    	 	</ul></div>	
	    				
	    			";
     
	endif; 	    
	$wp_query = $tmp_query;    

/* End slide creation */		

	wp_reset_query(); /* Reset post query */ 

/* Begin Portfolio javascript */ 
    
    $out .= <<<OUT
 <script type="text/javascript">
 	jQuery(document).ready(function ($) {
    $(function() {
        $('#gallery a').lightBox({
    		imageLoading:			'$root/images/portfolio/lightbox-ico-loading.gif',		
			imageBtnPrev:			'$root/images/portfolio/lightbox-btn-prev.gif',			
			imageBtnNext:			'$root/images/portfolio/lightbox-btn-next.gif',			
			imageBtnClose:			'$root/images/portfolio/lightbox-btn-close.gif',		
			imageBlank:				'$root/images/portfolio/lightbox-blank.gif',			
	 });
    });
    });
    </script>
OUT;

/* End Portfolio javascript */ 

echo $out;

/* END */ 
?>
	
	</div>
</div>

<?php
}
?>