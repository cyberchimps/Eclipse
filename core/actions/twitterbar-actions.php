<?php
/**
* Twitterbar actions used by response.
*
* Authors: Benjamin Mueller, Tyler Cunningham
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
* response Twitterbar actions
*/
add_action( 'response_twitterbar_section', 'response_twitterbar_section_content' );

/**
* Retrieves the Twitterbar options
*/
function response_twitterbar_section_content() {
	global $options, $ec_themeslug, $post; //call globals

	if ( is_page() ) {
		$handle = get_post_meta($post->ID, $ec_themeslug.'_twitter_handle' , true); 
		$replies = get_post_meta($post->ID, $ec_themeslug.'_twitter_reply' , true); 
		
		if ($replies == "off") {
			$show_replies = '0'; 
		}
		else {
			$show_replies = '1'; 
		}	
	}
	else {
		$handle = $options->get($ec_themeslug.'_blog_twitter');
		$show_replies = $options->get($ec_themeslug.'_blog_twitter_reply');
	}

	if ( $handle ) {
		response_display_latest_tweets( $handle, $show_replies );
	}
}

/**
* Display the latest tweets from Twitter
*/
function response_display_latest_tweets( $username, $show_replies = 0 ) {
	$latest_tweet = response_get_latest_tweets( $username, $show_replies );
?>
<div class="container">
	<div class="row">
		<div id="twitterbar" class="twelve columns"><!--id="twitterbar"-->
			<div id="bird">
				 <img class="twitter_bird" src="<?php echo get_template_directory_uri().'/images/twitterbird.png';?>" />
			</div>
			<div id="twittertext">
				<?php
					if ( $latest_tweet ) {	
						$screen_name = $latest_tweet['user']['screen_name'];
						$user_permalink = 'http://twitter.com/#!/'.$screen_name;
						$tweet_permalink = 'http://twitter.com/#!/'.$screen_name.'/status/'.$latest_tweet['id_str'];
						echo '<a href="'.$user_permalink.'"> '. $screen_name .' - </a>'.$latest_tweet['text'].' <small><a href="'.$tweet_permalink.'">' .human_time_diff(strtotime($latest_tweet['created_at']), current_time('timestamp', 1)).' ago</a></small>';
					} else {
						echo '<p>No tweets to display</p>';
					}
				?>
			</div>
		</div><!--end twitterbar-->
		<hr />
	</div>	
</div>
<?php
}

/**
* Get the latest tweets from Twitter
*/
function response_get_latest_tweets( $username, $show_replies = 0 ) {
	if ( $username ) :
		// Check to see if Latest Tweet is Saved in Transient and settings have not changed
		$cached_latest_tweet = get_transient('response_latest_tweet');
		if (@trim($cached_latest_tweet['latest_tweet']) !== '' && ($cached_latest_tweet['show_replies'] == $show_replies) && ($cached_latest_tweet['username'] == $username) ) return $cached_latest_tweet['latest_tweet'];

		// Latest Tweet not set create it now
		$latest_tweet = '';
		$exclude_replies = ( $show_replies == 0 ) ? '&exclude_replies=true' : '';
		$data = wp_remote_get('https://api.twitter.com/1/statuses/user_timeline.json?screen_name='.$username.$exclude_replies, array('sslverify' => false) );
		
		if (!is_wp_error($data)) {
			$value = json_decode($data['body'],true);
			$latest_tweet = $value[0]; // Array key 0 pulls the most recent Tweet
		}

		// Set the transient cache value
		set_transient('response_latest_tweet', array('username' => $username, 'show_replies' => $show_replies, 'latest_tweet' => $latest_tweet), apply_filters('response_latest_tweets_cache_time', 3600));
		
		return $latest_tweet;
	else :
		return false;
	endif;
}
/**
* End
*/
?>