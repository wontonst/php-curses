<?php
namespace Entities;

class CompoundMovingDrawable extends MovingDrawable{

 private $drawables;///<array of moving drawables

 /**
@param $x x-coordinate of the top-left corner of the drawable
@param $y y-coordinate of the top-left corner of the drawable
@param $shape NxN array of characters to print
  */
 public function __construct($x,$y,$shape,$path,$velocity){
   parent::__construct($x,$y,' ',$path,$velocity);
        if(!is_array($path))$path = array($path);
        $this->data['path'] = $path;
        $this->data['velocity'] = $velocity;
        $this->draw = 0;
	$this->constructShape($shape);
}
 private function constructShape(&$shape)
 {
   $x = $this->data['x'];
   $y = $this->data['y'];
   foreach($shape as $row)
     {
       foreach($row as $col)
	 {
	   $this->drawables[] = new MovingDrawable($x,$y,$col, $this->data['path'], $this->data['velocity']);
	 }
       $y = 0;
       $x++;
     }
 }

}

?>