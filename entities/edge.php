<?php

namespace Entities;

/**
MovingDrawable object spawner that works on the edge of the screen
*/
class Edge extends Group{

protected $direction;///<movement direction
protected $spawn;///<spawn coordinate
protected $velocity;///<spawn object velocity
protected $spawnrate;///<spawn rate (ticks/spawn)

public function __construct($direction,$coord,$velo=1,$rate=1)
{

}

}

?>