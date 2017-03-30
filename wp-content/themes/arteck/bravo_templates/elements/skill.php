<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 12/21/15
 * Time: 9:18 PM
 */
?>
<div class="bravo-skill-wrap">
	<div class="graph-bar onscroll-animate" data-percentage="<?php echo esc_html($number) ?>">
		<div class="graph-bar-label">
			<?php echo esc_html($name) ?>
		</div>
		<div class="graph-value">
			<?php echo esc_html($number) ?>%
		</div>
		<div class="graph-line">
			<div class="graph-line-value"></div>
		</div>
	</div>
</div>