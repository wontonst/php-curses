<?php
namespace Entities;

use Entities\Drawable;

/**
The moving drawable class adds the following to the data array.
<li>path => direction of travel</li>
<li>velocity => velocity of travel</li>
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
    private $draw;
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
        if($this->draw == $this->data['velocity'])
            $this->move();
        parent::prepare();
        $this->draw = $this->draw+1 % $this->data['velocity'];
    }
    public function move() {
$path = $this->data['path'][0];
if(count($this->data['path']) > 1)array_pop($this->data['path']);
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

}

?>