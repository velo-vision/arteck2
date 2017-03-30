<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 6/9/15
 * Time: 9:01 PM
 */
switch($type){
    case "block-title":
        echo '<div  class="block-title le-block '.$extraclass.'">
                            '.$content.'
                        </div>';
        break;
    case "block-logo":
        echo '<div  class="le-block block-logo '.$extraclass.'">
                           <div class="logo content">'.$content.'</div>
                        </div>';
        break;
    case "start-date":
        echo '<div  class="le-block start-date block-widget '.$extraclass.'">
                           <div class="content">'.$content.'</div>
                        </div>';
        break;
    case "block-quote":
        echo '<div  class="le-block block-quote '.$extraclass.'">
                           <blockquote>'.$content.'</blockquote>
                        </div>';
        break;
    case "block-image":
        if(!$image) break;
        $image_src_obj=wp_get_attachment_image_src($image,'full');
        echo '<div  class="le-block block-image '.$extraclass.'">
                           <div class="content bg-image" data-bg-image="'.$image_src_obj[0].'" ></div>
                        </div>';
        break;
    case "block-contact":
        echo '<div  class="le-block block-widget block-1x1 block-contact '.$extraclass.'">
                           <div class="content">'.$content.'</div>
                        </div>';
        break;


}