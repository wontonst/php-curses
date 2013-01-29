<?php 
/**
Anything that can be drawn onto the terminal screen.
*/
class Drawable{
/**
Data stored inside this array are in format key => value
<li>x => x coordinate</li>
<li>y => y coordinate</li>
<li>c => character to be drawn</li>
*/
private $data;

public function __construct($x,$y,$char){
$this->data['x']=$x;
$this->data['y']=$y;
$this->data['c']=$char;
}

public function draw()
{
ncurses_mvdelch($this->data['y'],$this->data['x']);
ncurses_addch($this->data['c']);
}

}

?>