<?php

include(__DIR__.'/../start.php');

use Entities\Frame;
use Entities\Spawner;
use Entities\Drawable;
use Entities\MovingDrawable;
use Entities\RandomSpawner;

class Matrix {

    const TICK_RATE=25000;
    const VELOCITY_LOW=1;
    const VELOCITY_HIGH=2;


    const HIGHEST_RATE=7;
    const LOWEST_RATE=22;///<lowest rate of spawn
    const LENGTH=32;///<length of number lines

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
                $GLOBALS['logger']->log($this->frame->getSize());
                $this->spawn();
                $nextspawn = mt_rand($i+Matrix::HIGHEST_RATE, $i+Matrix::LOWEST_RATE);
            }
        }
        $this->frame->close();
    }
    public function spawn() {
        $v=mt_rand(Matrix::VELOCITY_LOW,Matrix::VELOCITY_HIGH);
        $s = new RandomSpawner(MovingDrawable::S, mt_rand(0,79), 0, 'a',$v,$v);
        $s->setRandomBehavior(RandomSpawner::NUMERIC);
        $s->setSpawnsRemaining(Matrix::LENGTH);
        $s->setOffscreenOperation(Drawable::REMOVE_UPON_OFFSCREEN);
        $this->frame->add($s);
    }
}
$s = new Matrix(2000);
$s->start();
?>