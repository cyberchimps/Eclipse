<?php
/**
* Header template used by Eclipse.
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

	global $options, $ec_themeslug, $post; // call globals
	$reorder = $options->get($ec_themeslug.'_blog_section_order');
?>

<?php get_header(); ?>

		<?php
			foreach(explode(",", $options->get($ec_themeslug.'_blog_section_order')) as $fn) {
				if(function_exists($fn)) {
					call_user_func_array($fn, array());
				}
			}
		?>

<?php get_footer(); ?>