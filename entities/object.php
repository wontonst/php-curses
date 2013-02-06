<?php
namespace Entities;
/**
Higher level of abstraction from a Drawable. Does not need to be something that can be drawn.
*/
class Object {
    const BAD = 0;
    const GOOD= 1;

    protected $good;///<while this is true, the drawable will continue to exist
    protected $offscreen;///<defines behavior of object upon leaving screen

    public function __construct() {
        $this->good = Object::GOOD;
	//        $this->offscreen = Drawable::HIDE_WHILE_OFFSCREEN;
	$this->offscreen = Drawable::REMOVE_UPON_OFFSCREEN;
    }
    public function setOffscreenOperation($b) {
        $this->offscreen = $b;
    }
    public function isGood() {
        return $this->good==Object::GOOD;
    }
    public function update() {
        throw new Exception('Cannot call Object::update() directly. Must inherit.');
    }
}


?>