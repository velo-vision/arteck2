<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 2/25/15
 * Time: 9:20 PM
 */
?>
<a href="#" id="to-top">
        	<span id="top-arrow-1">
        		<i class="fa fa-angle-up"></i>
            </span>

            <span id="top-arrow-2">
            	<i class="fa fa-angle-up"></i>
      		</span>
</a>

<div id="page-screen-cover"></div>
<?php do_action('bravo_portfolio_carousel_popup_view_2');
BravoPortfolio::getFooterHtml();
	;?>
</div><!-- #all -->
<?php
	do_action('bravo_portfolio_carousel_popup');

	wp_footer();?>


</body>
</html>