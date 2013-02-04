<?php
require_once(__DIR__.'/entities/logger.php');
$GLOBALS['logger']=new Logger('log');
function __autoload($classname) {
    require_once(str_replace('\\','/',strtolower($classname)).'.php');
}

?>