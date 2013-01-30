<?php

include('start.php');

use Entities\Frame;
use Entities\Spawner;
use Entities\MovingDrawable;

$f = new Frame(100000);
$s = new Spawner(MovingDrawable::S,0,0,'a');
$f->add($s);
for($i = 0; $i != 20; $i++) {
    $f->step();
}

$f->close();
?>