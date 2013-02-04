<?php

$GLOBALS=new Logger('log');
function __autoload($classname) {
    require_once(str_replace('\\','/',strtolower($classname)).'.php');
}

?>