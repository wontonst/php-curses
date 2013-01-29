<?php

function __autoloader($classname)
{
require_once($classname);
}

$d = new Drawable(3,3,'r');

?>