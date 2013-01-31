<?php

include('../start.php');

use Entities\Frame;
use Entities\Spawner;
use Entities\MovingDrawable;
use Entities\RandomSpawner;

class Matrix {

const LOWEST_RATE=7;///<lowest rate of spawn
const LENGTH=33;///<length of number lines

    private $steps;
    private $frame;

    public function __construct($steps) {
        $this->steps=$steps;
        $this->frame = new Frame(70000);
    }
    public function start() {
$nextspawn = 0;
        for($i = 0; $i != $this->steps; $i++) {
            $this->frame->step();
            if($i > $nextspawn){
                $this->spawn();
$nextspawn = mt_rand($i,$i+Matrix::LOWEST_RATE);
}
        }
        $this->frame->close();
    }
    public function spawn() {
        $s = new RandomSpawner(MovingDrawable::S,mt_rand(0,79),0,'a');
        $s->setRandomBehavior(RandomSpawner::NUMERIC);
        $s->setSpawnsRemaining(Matrix::LENGTH);
        $this->frame->add($s);
    }
}

$s = new Matrix(200);
$s->start();
?>