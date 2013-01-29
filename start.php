<?php

use Entities\Drawable;

function __autoload($classname) {
    require_once(str_replace('\\','/',strtolower($classname)).'.php');
}

?>