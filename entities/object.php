<?php
namespace Entities;
/**
Higher level of abstraction from a Drawable. Does not need to be something that can be drawn.
*/
class Object extends StateObject{
    const BAD = 0;
    const GOOD= 1;

   protected $good;///<while this is true, the drawable will continue to exist
protected $offscreen;///<defines behavior of object upon leaving screen

public function __construct()
{
parent::__construct();
        $this->good = StateObject::GOOD;
    $this->offscreen = Drawable::HIDE_WHILE_OFFSCREEN;
}
    public function setOffscreenOperation($b) {
        $this->offscreen = $b;
    }
   public function isGood() {
        return $this->good==StateObject::GOOD;
    }
}


?>