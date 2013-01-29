<?php

namespace Entities;

/**
Groups of Drawable objects
*/
class Group {

    public $drawables;///<all drawable objects
    public $good;

    public function __construct() {
        $this->drawables= array();
        $this->good = true;
    }
    public function add($i,$key = null) {
        if(!$key)
            $key=count($this->drawables);
        $this->drawables[$key]=$i;
        return $key;
    }
    public function update() {
        for($i = 0; $i != count($this->drawables); $i++) $this->drawables[$i]->prepare();

        for($i = 0; $i < count($this->drawables); $i++) {
            $this->drawables[$i]->draw();
            if(!$this->drawables[$i]->isGood()) {
                unset($this->drawables[$i]);
                $this->drawables = array_values($this->drawables);
            }
        }
    }
}

?>