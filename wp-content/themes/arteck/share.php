<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 12/16/15
 * Time: 9:36 PM
 */
?>
<div class="share">
    <ul class="list-inline">
        <li><?php esc_html_e('SHARE ON','bs-smarty')?></li>
        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>&amp;title=<?php the_title()?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
        <li><a href="http://twitter.com/share?url=<?php the_permalink() ?>&amp;title=<?php the_title()?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
        <li><a href="https://plus.google.com/share?url=<?php the_permalink() ?>&amp;title=<?php the_title()?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
    </ul>
</div>