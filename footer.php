<?php
/**
* Footer template used by Eclipse.
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

global $options, $themeslug;

?>
</div>
<?php if ($options->get($themeslug.'_disable_footer') != "0"):?>	

	<div id="footer">
     	<div class="container">
     		<div class="row">
    	
	<!-- Begin @response footer hook content-->
		<?php response_footer(); ?>
	<!-- End @response footer hook content-->
	
	<?php endif;?>
	

		</div><!--end footer_wrap-->
	</div><!--end footer-->
</div> 

<?php if ($options->get($themeslug.'_hide_link') == "1"):?>
	<div id="afterfooter">
		<div id="afterfooterwrap">
		<div class="container">
		<div class="row">	
		<!-- Begin @response afterfooter hook content-->
			<?php response_secondary_footer(); ?>
		<!-- End @response afterfooter hook content-->
		</div>  <!--end afterfooterwrap-->	
	</div> <!--end afterfooter-->	
		</div> 	
		</div>
	<?php endif;?>
	
	<?php wp_footer(); ?>	
</body>

</html>
