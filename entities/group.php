<?php

namespace Entities;

/**
Groups of Drawable objects
*/
class Group extends Object {

    public $drawables;///<all drawable objects

    public function __construct() {
        parent::__construct();
        $this->drawables= array();
    }
    public function add(&$i,$key = null) {
        if(!$key)
            $key=count($this->drawables);
        $this->drawables[$key]=$i;
        return $key;
    }
    public function update() {
        $this->prepare();
        $this->draw();
    }
    public function prepare() {
        for($i = 0; $i != count($this->drawables); $i++) $this->drawables[$i]->prepare();
    }
    public function draw() {
        for($i = 0; $i < count($this->drawables); $i++) {
            $this->drawables[$i]->draw();
            if(!$this->drawables[$i]->isGood()) {
                unset($this->drawables[$i]);
                if(empty($this->drawables)) {
                    $this->good=Object::BAD;
                    return;
                }
                $this->drawables = array_values($this->drawables);
            }
        }
    }
}

?>