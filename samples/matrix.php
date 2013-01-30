<?php

include('../start.php');

use Entities\Frame;
use Entities\Spawner;
use Entities\MovingDrawable;
use Entities\RandomSpawner;

class Matrix {

    private $steps;
    private $frame;

    public function __construct($steps) {
        $this->steps=$steps;
        $this->frame = new Frame(100000);
    }
    public function start() {
        for($i = 0; $i != $this->steps; $i++) {
            $this->frame->step();
            if($i%10 == 0)
                $this->spawn();
        }
        $f->close();
    }
    public function spawn() {
        $s = new RandomSpawner(MovingDrawable::S,mt_rand(0,79),0,'a');
        $s->setRandomBehavior(RandomSpawner::NUMERIC);
        $s->setSpawnsRemaining(30);
        $this->frame->add($s);
    }
}

$s = new Matrix(100);
$s->start();
?>