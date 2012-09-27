<?php
/**
* 404 actions used by response.
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
* response 404 actions
*/
add_action( 'response_404', 'response_404_content' );

/**
* Sets up the 404 content message
*
* @since 3.0 
*/
function response_404_content() {
	global $options, $ec_themeslug; // call globals
	
	if ($options->get($ec_themeslug.'_custom_404') != '') {
		$message_text = $options->get($ec_themeslug.'_custom_404');
	}
	else {
		$message_text = apply_filters( 'response_404_message', 'Error 404' );
	} ?>
	<div class="error"><?php echo $message_text; ?><br />	</div> 
	<?php
}

/**
* End
*/

?>