<?php

namespace Entities;

/**
Groups of Drawable objects
*/
class Group{

public $drawables;///<all drawable objects

public function __construct()
{
$this->drawables= array();
}
public function add($i,$key = count($this->drawables))
{
$this->drawables[$key]=$i;
return $key;
}
public function update()
{
for($i = 0; $i != count($this->drawables);$i++) $this->drawables[$i]->prepare();
for($i = 0; $i != count($this->drawables);$i++) $this->drawables[$i]->draw();
}
}

?>