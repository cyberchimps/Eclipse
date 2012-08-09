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

/* Call globals. */	

	global $ec_themename, $ec_themeslug, $options;
	
/* End globals. */
	
?>

	<?php response_head_tag(); ?>
	
<?php wp_head(); ?> <!-- wp_head();-->
	
</head><!-- closing head tag-->

<!-- Begin @response after_head_tag hook content-->
	<?php response_after_head_tag(); ?>
<!-- End @response after_head_tag hook content-->
	
<!-- Begin @response before_header hook  content-->
	<?php response_before_header(); ?> 
<!-- End @response before_header hook content -->

<div class="wrapper"> 			
<header>		
	<?php
		foreach(explode(",", $options->get('header_section_order')) as $fn) {
			if(function_exists($fn)) {
				call_user_func_array($fn, array());
			}
		}
	?>
</header>

<!-- Begin @response after_header hook -->
	<?php response_after_header(); ?> 
<!-- End @response after_header hook -->
