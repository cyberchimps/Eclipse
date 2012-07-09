<?php 
/**
* Single template used by Eclipse.
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
* @since 3.0
*/
	global $options, $ec_themeslug, $post; // call globals

/* End variable definition. */	

get_header(); ?>


	<!--Begin @Core post area-->
		<?php response_post(); ?>
	<!--End @Core post area-->
	

<?php if ($options->get($ec_themeslug.'_single_breadcrumbs') == "1") { response_breadcrumbs();}?>

<?php get_footer(); ?>