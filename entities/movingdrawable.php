<?php
namespace Entities;

use Entities\Drawable;

/**
The moving drawable class adds the following to the data array.
<li>path => direction of travel</li>
<li>velocity => velocity of travel in ticks per movement</li>
*/
class MovingDrawable extends Drawable {

    const NW = 0;
    const N = 1;
    const NE = 2;
    const E = 3;
    const SE = 4;
    const S = 5;
    const SW = 6;
    const W = 7;

    /**
    Counter used to regulate velocity. When draw == velocity movement will be performed.
    */
    private $draw;///<whether or not to move
    public function __construct($x,$y,$char,$path,$velocity) {
        parent::__construct($x,$y,$char);
        if(!is_array($path))$path = array($path);
        $this->data['path'] = $path;
        $this->data['velocity'] = $velocity;
        $this->draw = 0;
    }
    /**
    prepares the object for drawing by performing movement operations and removing drawable graphics
    */
    public function prepare() {
        parent::prepare();
        if($this->draw == $this->data['velocity']) {
            $this->move();
        }
        $this->draw = ($this->draw+1) % ($this->data['velocity']+1);
    }
    public function move() {
        $path = array_shift($this->data['path']);
        if(empty($this->data['path']))$this->data['path'][]=$path;
        switch($path) {
        case MovingDrawable::NW:
            $this->data['x']--;
            $this->data['y']--;
            break;
        case MovingDrawable::N:
            $this->data['y']--;
            break;
        case MovingDrawable::NE:
            $this->data['x']++;
            $this->data['y']--;
            break;
        case MovingDrawable::E:
            $this->data['x']++;
            break;
        case MovingDrawable::SE:
            $this->data['x']++;
            $this->data['y']++;
            break;
        case MovingDrawable::S:
            $this->data['y']++;
            break;
        case MovingDrawable::SW:
            $this->data['x']--;
            $this->data['y']++;
            break;
        case MovingDrawable::W:
            $this->data['x']--;
            break;
        }
    }
    public function isGood() {
        return $this->good;
    }
}

?>