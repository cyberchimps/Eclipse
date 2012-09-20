<?php
/**
* Theme functions used by Eclipse.
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

/**
* Establishes 'response' as the textdomain, sets $locale and file path
*
* @since 1.0
*/
function response_text_domain() {
	load_theme_textdomain( 'response', get_template_directory() . '/core/languages' );

	    $locale = get_locale();
	    $locale_file = get_template_directory() . "/core/languages/$locale.php";
	    if ( is_readable( $locale_file ) )
		    require_once( $locale_file );
		
		return;    
}
add_action('after_setup_theme', 'response_text_domain');

function eclipse_url_filtered($fields){
	if(isset($fields['url']))
   		unset($fields['url']);
   	
  	return $fields;
}
add_filter('comment_form_default_fields', 'eclipse_url_filtered');


/**
* Define global theme functions.
*/ 
	$ec_themename = 'eclipse';
	$ec_themenamefull = 'Eclipse';
	$ec_themeslug = 'ec';
	$ec_root = get_template_directory_uri(); 
	$ec_pagedocs = 'http://cyberchimps.com/question/using-the-eclipse-page-options/';
	$ec_sliderdocs = 'http://cyberchimps.com/question/using-the-eclipse-feature-slider/';

/**
* Set Content Width.
*/	
	if ( ! isset( $content_width ) ) $content_width = 720; //Set content width

/**
* Basic theme setup.
*/ 
function eclipse_theme_setup() {
	
/**
* Initialize response Core Framework and Pro Extension.
*/ 
	require_once ( get_template_directory() . '/core/core-init.php' );

/**
* Call additional files required by theme.
*/ 
	require_once ( get_template_directory() . '/includes/classy-options-init.php' ); // Theme options markup.
	require_once ( get_template_directory() . '/includes/options-functions.php' ); // Custom functions based on theme options.
	require_once ( get_template_directory() . '/includes/meta-box.php' ); // Meta options markup.
	require_once ( get_template_directory() . '/includes/presstrends.php' ); // Meta options markup.
	
	add_theme_support(
		'post-formats',
		array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat')
	);

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 720, 240, true );
	add_theme_support('automatic-feed-links');
	add_editor_style();
}
add_action( 'after_setup_theme', 'eclipse_theme_setup' );

/**
* Redirect user to theme options page after activation.
*/ 
if ( is_admin() && isset($_GET['activated'] ) && $pagenow =="themes.php" ) {
	wp_redirect( 'themes.php?page=eclipse' );
}

/**
* Add link to theme options in Admin bar.
*/ 
function eclipse_admin_link() {
	global $wp_admin_bar;

	$wp_admin_bar->add_menu( array( 'id' => 'Eclipse', 'title' => 'Eclipse Options', 'href' => admin_url('themes.php?page=eclipse')  ) ); 
}
add_action( 'admin_bar_menu', 'eclipse_admin_link', 113 );

/**
* Custom markup for gallery posts in main blog index.
*/ 
function eclipse_custom_gallery_post_format( $content ) {
	global $options, $ec_themeslug, $post;
	$ec_root = get_template_directory_uri();
	$featured_images = $options->get($ec_themeslug.'_show_featured_images'); 
	
	 ob_start(); 
		?>	
			<div class="row">
			<div class="three columns"><?php response_post_byline(); ?></div>
				<div class="entry nine columns">
					<h2 class="posts_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<?php if ( has_post_thumbnail() && $featured_images == '1'  && !is_single()) {
					echo '<div class="featured-image">';
					echo '<a href="' . get_permalink($post->ID) . '" >';
						the_post_thumbnail();
						echo '</a>';
						echo '</div>';
				}
				?>					
				<?php if (!is_single()): ?>
				<?php $images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
					if ( $images ) :
						$total_images = count( $images );
						$image = array_shift( $images );
						$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
				?>

				<figure class="gallery-thumb">
					<a href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
					<br /><br />
					This gallery contains <?php echo $total_images ; ?> images
					<?php endif;?>
				</figure><!-- .gallery-thumb -->
				<?php endif;?>
				
				<?php if (is_single()): ?>
					<?php the_content(); ?>
				<?php endif;?>
				
				<!--Begin @Core link pages hook-->
					<?php response_link_pages(); ?>
				<!--End @Core link pages hook-->
			
				<!--Begin @Core post edit link hook-->
					<?php response_edit_link(); ?>
				<!--End @Core post edit link hook-->
				</div><!--end entry-->
			</div><!--end row-->
			<?php	
		
		$content = ob_get_clean();	
		return $content; 
}
add_filter('response_post_formats_gallery_content', 'eclipse_custom_gallery_post_format' ); 
	
/**
* Set custom post excerpt link text based on theme option.
*/ 
function eclipse_new_excerpt_more($more) {

	global $ec_themename, $ec_themeslug, $options, $custom_excerpt, $post, $ec_root;
    
    	if ($options->get($ec_themeslug.'_excerpt_link_text') == '') {
    		$linktext = 'Continue Reading';
   		}
   		
   		elseif ($custom_excerpt == 'recent') {
    		$linktext = 'Continue Reading';
    	}
    	else {
    		$linktext = $options->get($ec_themeslug.'_excerpt_link_text');
   		}

	return '&hellip;</p><div class="more-link"><span class="continue-arrow"><img src="'.$ec_root.'/images/continue.png"></span><a href="'. get_permalink($post->ID) . '">  '.$linktext.'</a></div>';
}
add_filter('excerpt_more', 'eclipse_new_excerpt_more');

/**
* Set custom post excerpt length based on theme option.
*/ 
function eclipse_new_excerpt_length($length) {

	global $ec_themename, $ec_themeslug, $custom_excerpt, $options;
	
		if ($options->get($ec_themeslug.'_excerpt_length') == '') {
    		$length = '55';
    	}
    	
    	elseif ($custom_excerpt == 'recent') {
    		$length = '15';
    	}
    	else {
    		$length = $options->get($ec_themeslug.'_excerpt_length');
    	}
    	
	return $length;
}
add_filter('excerpt_length', 'eclipse_new_excerpt_length');

/**
* Attach CSS3PIE behavior to elements
*/   
function eclipse_render_ie_pie() { ?>
	
	<style type="text/css" media="screen">
		#wrapper input, textarea, #twitterbar, input[type=submit], input[type=reset], #imenu, .searchform, .post_container, .postformats, .postbar, .post-edit-link, .widget-container, .widget-title, .footer-widget-title, .comments_container, ol.commentlist li.even, ol.commentlist li.odd, .slider_nav, ul.metabox-tabs li, .tab-content, .list_item, .section-info, #of_container #header, .menu ul li a, .submit input, #of_container textarea, #of_container input, #of_container select, #of_container .screenshot img, #of_container .of_admin_bar, #of_container .subsection > h3, .subsection, #of_container #content .outersection .section, #carousel_list, #calloutwrap, #calloutbutton, .box1, .box2, .box3, .es-carousel-wrapper
  		
  	{
  		behavior: url('<?php echo get_template_directory_uri();  ?>/core/library/pie/PIE.php');
	}
	</style>
<?php
}

add_action('wp_head', 'eclipse_render_ie_pie', 8);


/**
* Google Analytics.
*/ 
function eclipse_google_analytics() {
	global $ec_themename, $ec_themeslug, $options;
	
	echo stripslashes ($options->get($ec_themeslug.'_ga_code'));

}
add_action('wp_head', 'eclipse_google_analytics');

	
/**
* Register custom menus for header, footer.
*/ 
function eclipse_register_menus() {
	register_nav_menus(
	array( 'header-menu' => __( 'Header Menu', 'response' ))
  );
}
add_action( 'init', 'eclipse_register_menus' );
	
/**
* Menu fallback if custom menu not used.
*/ 
function eclipse_menu_fallback() {
	global $post; ?>
	
	<ul id="nav_menu">
		<?php wp_list_pages( 'title_li=&sort_column=menu_order&depth=3'); ?>
	</ul><?php
}
/**
* Register widgets.
*/ 
function eclipse_widgets_init() {
    register_sidebar(array(
    	'name' => 'Full Sidebar',
    	'id'   => 'sidebar-widgets',
    	'description'   => 'These are widgets for the sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget-container">',
    	'after_widget'  => '</div>',
    	'before_title'  => '<h2 class="widget-title">',
    	'after_title'   => '</h2>'
    ));
    register_sidebar(array(
    	'name' => 'Left Half Sidebar',
    	'id'   => 'sidebar-left',
    	'description'   => 'These are widgets for the left sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget-container">',
    	'after_widget'  => '</div>',
    	'before_title'  => '<h2 class="widget-title">',
    	'after_title'   => '</h2>'
    ));    	
    register_sidebar(array(
    	'name' => 'Right Half Sidebar',
    	'id'   => 'sidebar-right',
    	'description'   => 'These are widgets for the right sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget-container">',
    	'after_widget'  => '</div>',
    	'before_title'  => '<h2 class="widget-title">',
    	'after_title'   => '</h2>'
   	));
    	
   	register_sidebar(array(
		'name' => 'Footer',
		'id' => 'footer-widgets',
		'description' => 'These are the footer widgets',
		'before_widget' => '<div class="three columns footer-widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="footer-widget-title">',
		'after_title' => '</h3>',
	));
}
add_action ('widgets_init', 'eclipse_widgets_init');
?>