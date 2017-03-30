<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 1/14/16
 * Time: 8:57 PM
 */
?>
<div class="bravo-counter-up slider-item">
	<div class="graph-donut onscroll-animate" data-percentage="<?php echo esc_attr($number) ?>" data-delay="400">
		<div class="graph-value">
			<?php echo esc_attr($number) ?>%
		</div>
		<div class="graph-left">
			<div class="graph-inner"></div>
		</div>
		<div class="graph-right">
			<div class="graph-inner"></div>
		</div>
	</div>
	<h3><?php echo esc_html($name) ?></h3>
	<div class="p">
		<?php echo ($content) ?>
	</div>
</div>
