<?php
use Entities\Frame;
use Entities\Group;
use Entities\MovingDrawable;

include('start.php');


$s = new Frame();

$d = new MovingDrawable(10,40,'s',MovingDrawable::SE,1);
$s->add($d);
for($i = 0; $i != 15; $i++){
$s->step();
usleep(100000);
}
$s->close();

?>