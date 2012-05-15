<?php if (dynamic_sidebar('Sidebar Widgets')) : else : ?>
    
        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->
    
		<div class="widget-container">    
		<h2 class="widget-title">Eclipse</h2>
		<p>Thank you for using Eclipse.</p>
		<p>We designed Eclipse to be as user friendly as possible, but if you do run into trouble we provide a <a href="http://cyberchimps.com/forum">support forum</a>, and <a href="http://www.cyberchimps.com/eclipse/docs/">precise documentation</a>.</p>

    	</div>
		
		<div class="widget-container">    
		<h2 class="widget-title"><?php printf( __('Pages', 'reponse' )); ?></h2>
		<ul>
    	<?php wp_list_pages('title_li=' ); ?>
    	</ul>
    	</div>
    
		<div class="widget-container">    
    	<h2 class="widget-title"><?php printf( __( 'Archives', 'reponse' )); ?></h2>
    	<ul>
    		<?php wp_get_archives('type=monthly'); ?>
    	</ul>
    	</div>
        
		<div class="widget-container">    
       <h2 class="widget-title"><?php printf( __('Categories', 'reponse' )); ?></h2>
        <ul>
    	   <?php wp_list_categories('show_count=1&title_li='); ?>
        </ul>
        </div>
        
		<div class="widget-container">    
    	<h2 class="widget-title"><?php printf( __('WordPress', 'reponse' )); ?></h2>
    	<ul>
    		<?php wp_register(); ?>
    		<li><?php wp_loginout(); ?></li>
    		<li><a href="<?php echo esc_url( __('http://wordpress.org/', 'reponse' )); ?>" target="_blank" title="<?php esc_attr_e('Powered by WordPress, state-of-the-art semantic personal publishing platform.', 'reponse'); ?>"> <?php printf( __('WordPress', 'reponse' )); ?></a></li>
    		<?php wp_meta(); ?>
    	</ul>
    	</div>
    	
    	<div class="widget-container">
    	<h2 class="widget-title"><?php printf( __('Subscribe', 'reponse' )); ?></h2>
    	<ul>
    		<li><a href="<?php bloginfo('rss2_url'); ?>"><?php printf( __('Entries (RSS)', 'reponse' )); ?></a></li>
    		<li><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php printf( __('Comments (RSS)', 'reponse' )); ?></a></li>
    	</ul>
    	</div>
	
<?php endif; ?>