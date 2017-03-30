<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 1/13/16
 * Time: 9:02 PM
 */
if($effect){
	$size.=' onscroll-animate';
}
printf('<a href="%s" class="button-%s" data-animate="%s">%s</a>',$url,$size,$effect,$text);

