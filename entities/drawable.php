<?php namespace Entities;
/**
Anything that can be drawn onto the terminal screen.
*/
class Drawable {
    /**
    Data stored inside this array are in format key => value
    <li>x => x coordinate</li>
    <li>y => y coordinate</li>
    <li>c => character to be drawn</li>
    */
    protected $data;

    public function __construct($x,$y,$char) {
        $this->data['x']=$x;
        $this->data['y']=$y;
        $this->data['c']=$char;
    }
    public function update() {
        $this->prepare();
        $this->draw();
    }
    /**
    prepares the object for drawing by removing its displayed graphics
    */
    public function prepare() {
        ncurses_mvdelch($this->data['y'],$this->data['x']);
    }
    public function draw() {
        if($this->data['x'] > -1 && $this->data['x'] < $GLOBALS['y'] && $this->data['y'] > -1 && $this->data['y'] < $GLOBALS['y'])
            ncurses_addch(ord($this->data['c']));
    }

}

?>