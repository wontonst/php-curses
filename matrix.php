<?php

include('../start.php');

use Entities\Frame;
use Entities\Spawner;
use Entities\MovingDrawable;
use Entities\RandomSpawner;

class Matrix{

private $steps;
private $frame;

public function __construct($steps)
{
$this->steps=$steps;
$this->frame = new Frame(100000);
}
public function start()
{
for($i = 0; $i != $this->steps; $i++) {
    $f->step();
}
$f->close();
}

}

$s = new RandomSpawner(MovingDrawable::S,9,0,'a');
$s->setRandomBehavior(RandomSpawner::NUMERIC);
$f->add($s);

?>