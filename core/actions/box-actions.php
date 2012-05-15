<?php
/**
* Box section actions used by response 
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
* response Box Section actions
*/
add_action( 'response_box_section', 'response_box_section_content' );

/**
* Sets up the Box Section wigetized area
*
* @since 1.0
*/
function response_box_section_content() { 
	global $options, $themeslug, $post, $root; //call globals
	
	if (is_page()){
		$title = get_post_meta($post->ID, 'box_title' , true);;
		$toggle = get_post_meta($post->ID, 'box_title_toggle' , true);;
	} else {
		$title = $options->get($themeslug.'_box_title');
		$toggle = $options->get($themeslug.'_box_title_toggle');
	}
?>
<div class="container">
<div class="row">
<?php if ($toggle == '1' OR $toggle == 'on'): ?>
	<h4 class="box_element_title"><?php echo $title; ?></h4>
<?php endif; ?>
</div>
<div class="row boxes">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box 1") ) : ?>
		<div id="box1" class="three columns">
			<img src="<?php echo $root ; ?>/images/icons/widget.png" alt="slider" class="alignleft" />
			<h2 class="box-widget-title">Responsive Design</h2>	
				<p class="boxtext">
					Response Pro’s Modern Responsive Design automatically adjusts to any mobile device including the iPhone, iPad, and Android devices.
				</p>
			</div><!--end box1-->
		<?php endif; ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box 2") ) : ?>
		<div id="box2" class="three columns">
			<img src="<?php echo $root ; ?>/images/icons/widget.png" alt="slider" class="alignleft" />
			<h2 class="box-widget-title">Content Feature Slider </h2>
				<p class="boxtext">
					response Pro comes with a SEO and iOS friendly Responsive Content Feature Slider that displays content professionally and beautifully on any device.
				</p>
		</div><!--end box2-->
		<?php endif; ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box 3") ) : ?>
		<div id="box3" class="three columns">
			<img src="<?php echo $root ; ?>/images/icons/widget.png" alt="slider" class="alignleft" />
			<h2 class="box-widget-title">Drag and Drop Elements</h2>
				<p class="boxtext">
					response Pro includes a variety of Drag and Drop Page Elements make mananaging content easy and can be used on a per-page basis.
				</p>
		</div><!--end box3-->
		<?php endif; ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box 4") ) : ?>
		<div id="box4" class="three columns">
			<img src="<?php echo $root ; ?>/images/icons/widget.png" alt="slider" class="alignleft" />
			<h2 class="box-widget-title">Excellent Support</h2>
				<p class="boxtext">
					response Pro is built for any response, and offers intuitive theme options. If you do run into trouble we provide a <a href="http://cyberchimps.com/forum/pro/">Support Forum</a>, and precise <a title="response Pro Docs" href="http://cyberchimps.com/responsepro/docs/">Documentation</a>.
				</p>
		</div><!--end box3-->
		<?php endif; ?>
</div>
</div>
<?php
	}


/**
* End
*/

?>