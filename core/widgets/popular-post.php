<?php

add_action('widgets_init', 'popular_post');
add_image_size('ifeature-tabbed', 45, 45, true);

function popular_post() {
	register_widget('popular_post');
}

class popular_post extends WP_Widget {
	function __construct() {
		$widget_options = array(
			'classname' => 'popular_post',
			'description' => __('Display Popular posts.', 'ifeature')
		);

		$control_options = array(
			'width' => 300,
			'height' => 350,
			'id_base' => 'popular_post'
		);

		parent::__construct(
			'popular_post',
			__('Popular Post', 'ifeature'),
			$widget_options,
			$control_options
		);
	}

	function widget($args, $instance) {
		global $wpdb;

		

		$title = $instance['title'];

		echo $args['before_widget'];

				

?>
<div class="ifeature-tabbed-widget widget-main-div">
	<div class="ifeature-tabbed-wrap">
			<h5><?php echo $instance['title']; ?></h5>
			<hr>
			<ul class="ifeature-tabbed-popular_posts">
				<?php
					$popular_posts = new WP_Query();
					$popular_posts->query(array('ignore_sticky_posts' => '1', 'posts_per_page' => 5, 'orderby' => 'comment_count'));
					while($popular_posts->have_posts()): $popular_posts->the_post();

					?>
						<li class="widget-post">
							<div class="tab-image widget-img" >
								<a href="<?php the_permalink() ?>"><?php the_post_thumbnail("ifeature-tabbed") ?>
							</div>

							<div class="details">
								<h5 class="tabbed-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
							</div>
						</li>
						<hr>
					<?php
					endwhile;
				?>
			</ul>
	</div> <!-- .ifeature-tabbed-wrap -->
</div> <!-- .ifeature-tabbed-widget -->
	<?php
		wp_reset_query();
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];
		
		return $instance;
	}

	function form($instance) {
		$defaults = array(
			
			'title' => 'Popular'
		);

		$instance = wp_parse_args((array) $instance, $defaults);
		?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:') ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo "Popular"; ?>" />
			</p>
		<?php
	}
}