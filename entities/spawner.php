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
    ticker - ticker
    */
    protected $data;

    public function __construct($direction, $xcord, $ycord, $char, $velo=1, $rate=1) {
        parent::__construct();
        $this->direction=$direction;
        $this->velocity=$velo;
        $this->spawnrate=$rate;
        $this->data['ticker']=0;
        $this->data['x']=$xcord;
        $this->data['y']=$ycord;
        $this->data['char']=$char;
    }
    public function update() {
        $this->prepare();
        if($this->data['ticker'] == $this->spawnrate)
            $this->spawn();
        $this->data['ticker']=  ($this->data['ticker'] + 1) % ($this->spawnrate + 1);
        $this->draw();
    }
    public function spawn() {
        $this->add(new MovingDrawable($this->data['x'], $this->data['y'], $this->data['char'], $this->direction, $this->velocity));
    }
}


           ?>