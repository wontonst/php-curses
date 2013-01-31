<?php
namespace Entities;

class RandomSpawner extends Spawner {

    const NUMERIC = 0;
    const LOWERCASE = 1;
    const UPPERCASE = 2;
    const LETTER = 3;

    public function __construct($direction, $xcord, $ycord, $char, $velo=1, $rate=1,$tospawn=-1) {
        parent::__construct($direction,$xcord,$ycord,$char,$velo,$rate,$tospawn);
    }

    protected $behavior;///<random spawn behavior

    public function setRandomBehavior($i) {
        $this->behavior=$i;
    }

    public function spawnOne() {
        switch($this->behavior) {
        case RandomSpawner::NUMERIC:
            $char = mt_rand(0,9);//numeric
            break;
        case RandomSpawner::LOWERCASE:
            $char = chr(97+mt_rand(0,25));//lower
            break;
        case RandomSpawner::UPPERCASE:
            $char = chr(65+mt_rand(0,25));//upper
            break;
        case RandomSpawner::LETTER:
            $char = chr(97+mt_rand(0,25));//lower
            $char = mt_rand(0,1) == 0 ? strtoupper($char):$char;
            break;
        default:
            $char=$this->data['char'];
        }
        $this->add(new MovingDrawable($this->data['x'], $this->data['y'], $char, $this->direction, $this->velocity));
    }


}