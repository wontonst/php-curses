<?php

namespace Entities;

/**
MovingDrawable object spawner
*/
class Spawner extends Group {

    protected $direction;///<movement direction
    protected $velocity;///<spawn object velocity
    protected $spawnrate;///<spawn rate (ticks/spawn)

    /**
    stores
    x - x-coordinate
    y - y-coordinate
    char - spawn character
    spawnsremaining - remaining spawns to perform, -1 is infinite
    ticker - ticker
    */
    protected $data;

    /**
    @param $direction MovingDrawable enum direction
    @param $xcord spawn xcoordinate
    @param $ycord spawn ycoordinate
    @param $char character to spawn
    @param $velo spawned object velocity
    @param $rate spawn rate
    @param $tospawn number of objects to spawn
    */
    public function __construct($direction, $xcord, $ycord, $char, $velo=1, $rate=1,$tospawn=-1) {
        parent::__construct();
        $this->direction=$direction;
        $this->velocity=$velo;
        $this->spawnrate=$rate;
        $this->data['ticker']=0;
        $this->data['x']=$xcord;
        $this->data['y']=$ycord;
        $this->data['char']=$char;
        $this->data['spawnsremaining']=$tospawn;
    }
    public function update() {
        $this->prepare();
        if($this->data['ticker'] == $this->spawnrate)
            $this->spawn();
        $this->data['ticker']=  ($this->data['ticker'] + 1) % ($this->spawnrate + 1);
        $this->draw();
    }
    public function setSpawnsRemaining($i) {
        $this->data['spawnsremaining']=$i;
    }
    public function spawn() {
        if($this->data['spawnsremaining'] != 0) {
            $this->spawnOne();
            $this->data['spawnsremaining']--;
        } else if (empty($this->drawables)) {
            $this->$good=StateObject::BAD;
        }
    }

    public function spawnOne() {
$draw = new MovingDrawable($this->data['x'], $this->data['y'], $this->data['char'], $this->direction, $this->velocity);
$draw->setOffscreenBehavior($this->offscreen);
$this->add($draw);
    }
}


?>