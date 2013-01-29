<?php

namespace Entities;
/**
An object with a state
*/
class StateObject{

const BAD = 0;
const GOOD= 1;

    protected $good;///<while this is true, the drawable will continue to exist

public function __construct()
{
        $this->good = StateObject::GOOD;
}
    public function isGood() {
        return $this->good==StateObject::GOOD;
    }

}

?>