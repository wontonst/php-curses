<?php
use Entities\Frame;
use Entities\Group;
use Entities\Drawable;

include('start.php');


$s = new Frame();

$d = new Drawable(3,3,'r');
$s->add($d);
$s->step();
usleep(1000000);
$s->close();

?>