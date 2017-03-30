<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 1/13/16
 * Time: 10:13 PM
 */
?>
<div class="bravo-quote">
	<div class="testimonial">
		<?php echo ($content)?>
		<?php if(!empty($author)){?>
		<div class="testimonial-author"><?php echo esc_html($author)  ?></div>
		<?php }?>
	</div>
</div>
