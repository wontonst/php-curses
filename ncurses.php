<?php
use Entities\Frame;
use Entities\Group;
use Entities\MovingDrawable;

include('start.php');


$s = new Frame();

$d = new MovingDrawable(40,10,'s',MovingDrawable::SE,1);
$d2 = new MovingDrawable(50,10,'r',MovingDrawable::SE,1);
$s->add($d);
$s->add($d2);
for($i = 0; $i != 15; $i++){
$s->step();
usleep(100000);
}
$s->close();

?>