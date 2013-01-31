<?php

include(__DIR__.'/../start.php');
include(__DIR__.'/logger.php');

use Entities\Frame;
use Entities\Spawner;
use Entities\Drawable;
use Entities\MovingDrawable;
use Entities\RandomSpawner;

class Matrix {
const HIGHEST_RATE=5;

const TICK_RATE=45000;
const VELOCITY=3;

    const LOWEST_RATE=17;///<lowest rate of spawn
    const LENGTH=33;///<length of number lines

    private $steps;
    private $frame;

    public function __construct($steps) {
        $this->steps=$steps;
        $this->frame = new Frame(Matrix::TICK_RATE);
    }
    public function start() {
        $nextspawn = 0;
        for($i = 0; $i != $this->steps; $i++) {
            $this->frame->step();
            if($i > $nextspawn) {
$GLOBALS['log']->log($this->frame->getSize());
                $this->spawn();
                $nextspawn = mt_rand($i+Matrix::HIGHEST_RATE, $i+Matrix::LOWEST_RATE);
            }
        }
        $this->frame->close();
    }
    public function spawn() {
        $s = new RandomSpawner(MovingDrawable::S,mt_rand(0,79),0,'a',Matrix::VELOCITY,Matrix::VELOCITY);
        $s->setRandomBehavior(RandomSpawner::NUMERIC);
        $s->setSpawnsRemaining(Matrix::LENGTH);
$s->setOffscreenOperation(Drawable::REMOVE_UPON_OFFSCREEN);
        $this->frame->add($s);
    }
}
$GLOBALS['log']=new Logger('log');
$s = new Matrix(2000);
$s->start();
?>