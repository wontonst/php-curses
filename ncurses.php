<?php
use Entities\Frame;
use Entities\Group;
use Entities\MovingDrawable;

include('start.php');

$mvt = array(MovingDrawable::N,MovingDrawable::N,MovingDrawable::N,MovingDrawable::S,MovingDrawable::S);

$s = new Frame();

$g = new Group();
$d = new MovingDrawable(40,10,'s',MovingDrawable::SE,12);
$d2 = new MovingDrawable(50,9,'r',MovingDrawable::SE,20);
$g->add($d);
$g->add($d2);
$d = new MovingDrawable(30,5,'w',MovingDrawable::N,33);
$g->add($d);
$d = new MovingDrawable(60,3,'X',$mvt,50);
$g->add($d);
$s->add($g);
for($i = 0; $i != 350; $i++) {
    $s->step();
    usleep(10000);
}
$s->close();

?>