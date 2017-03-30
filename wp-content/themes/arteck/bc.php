<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 3/5/15
 * Time: 9:09 PM
 */
?>
<section id="breadcrumb">
    <div class="container">
        <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
            <?php if(function_exists('bcn_display_list'))
            {
                echo '<ol class="le-breadcrumb breadcrumb">';
                bcn_display_list();
                echo '</ol>';
            }else{
                bravo_breadcrumb();
            }?>
        </div>
    </div>
</section>