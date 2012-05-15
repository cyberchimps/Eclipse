<?php
/**
 * Create meta box for editing pages in WordPress
 *
 * Compatible with custom post types since WordPress 3.0
 * Support input types: text, textarea, checkbox, checkbox list, radio box, select, wysiwyg, file, image, date, time, color
 *
 * @author: Rilwis
 * @url: http://www.deluxeblogtips.com/2010/04/how-to-create-meta-box-wordpress-post.html
 * @usage: please read document at project homepage and meta-box-usage.php file
 * @version: 3.0.1
 */
 

/********************* BEGIN DEFINITION OF META BOXES ***********************/

add_action('init', 'initialize_the_meta_boxes');

function initialize_the_meta_boxes() {

	global  $themename, $themeslug, $themenamefull, $options; // call globals.
	
	// Call taxonomies for select options

	$terms2 = get_terms('category', 'hide_empty=0');
	$blogoptions = array();
	$blogoptions['all'] = "All";

		foreach($terms2 as $term) {
			$blogoptions[$term->slug] = $term->name;
		}
	
	// End taxonomy call
	
	$meta_boxes = array();
		
	$mb = new Chimps_Metabox('pages', $themenamefull.' Page Options', array('pages' => array('page')));
	$mb
		->tab("Page Options")
			->image_select('page_sidebar', 'Select Page Layout', '',  array('options' => array(TEMPLATE_URL . '/images/options/right.png' , TEMPLATE_URL . '/images/options/left.png', TEMPLATE_URL . '/images/options/rightleft.png', TEMPLATE_URL . '/images/options/tworight.png', TEMPLATE_URL . '/images/options/none.png')))
			->checkbox('hide_page_title', 'Page Title', '', array('std' => 'on'))
			->section_order('page_section_order', 'Page Elements', '', array('options' => array(
					'page_section' => 'Page',
					'breadcrumbs' => 'Breadcrumbs',
					'portfolio_element' => 'Portfolio',
					'recent_posts_element' => 'Recent Posts',
					'twitterbar_section' => 'Twitter Bar',
					'box_section' => 'Boxes'
							
					),
					'std' => 'page_section,breadcrumbs'
				))
			->pagehelp('', 'Need Help?', '')
		->tab("Box Options")
			->checkbox('box_title_toggle', 'Title', '')
			->text('box_title', '', '')
		->tab("Recent Posts Options")
			->checkbox('recent_posts_title_toggle', 'Title', '')
			->text('recent_posts_title', '', '')
			->select('recent_posts_category', 'Post Category', '', array('options' => $blogoptions, 'all') )
			->checkbox('recent_posts_images_toggle', 'Images', '')
		->tab("Portfolio Options")
			->single_image('page_portfolio_image_one', 'First Portfolio Image', '', array('std' =>  TEMPLATE_URL . '/images/portfolio.jpg'))
			->text('page_portfolio_image_one_caption', 'First Portfolio Image Caption', '', array('std' => 'Image 1'))
			->single_image('page_portfolio_image_two', 'Second Portfolio Image', '', array('std' =>  TEMPLATE_URL . '/images/portfolio.jpg'))
			->text('page_portfolio_image_two_caption', 'Second Portfolio Image Caption', '', array('std' => 'Image 2'))
			->single_image('page_portfolio_image_three', 'Third Portfolio Image', '', array('std' =>  TEMPLATE_URL . '/images/portfolio.jpg'))
			->text('page_portfolio_image_three_caption', 'Third Portfolio Image Caption', '', array('std' => 'Image 3'))
			->single_image('page_portfolio_image_four', 'Fourth Portfolio Image', '', array('std' =>  TEMPLATE_URL . '/images/portfolio.jpg'))
			->text('page_portfolio_image_four_caption', 'Fourth Portfolio Image Caption', '', array('std' => 'Image 4'))
			->checkbox('portfolio_title_toggle', 'Portfolio Title', '')
			->text('portfolio_title', 'Title', '', array('std' => 'Portfolio'))
		->tab("Twitter Options")
			->text('twitter_handle', 'Twitter Handle', 'Enter your Twitter handle if using the Twitter bar')
			->checkbox('twitter_reply', 'Show @ Replies', '')
		->tab("SEO Options")
			->text('seo_title', 'SEO Title', '')
			->textarea('seo_description', 'SEO Description', '')
			->textarea('seo_keywords', 'SEO Keywords', '')
			->pagehelp('', 'Need help?', '')
		->end();

	foreach ($meta_boxes as $meta_box) {
		$my_box = new RW_Meta_Box_Taxonomy($meta_box);
	}

}
