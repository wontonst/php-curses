<?php

namespace Entities;

class Frame {

    private $obj;///<collection of drawables
    private $dim;///<dimensions array, holds keys x and y

    private $tickrate;///<time between ticks
    public function __construct($t) {
        ncurses_init();
        ncurses_getmaxyx(STDSCR,$this->dim['y'],$this->dim['x']);
        $GLOBALS['x'] = $this->dim['x'];
        $GLOBALS['y'] = $this->dim['y'];
        $screen = ncurses_newwin(0,0,0,0);
        $this->tickrate=$t;
        $this->repaint();
    }

    public function step() {
        for($i = 0; $i < count($this->obj); $i++) {
            $this->obj[$i]->update();
            if(!$this->obj[$i]->isGood())
                unset($this->obj[$i]);
            $this->obj = array_values($this->obj);
        }
        $this->repaint();
        usleep($this->tickrate);
    }
    public function repaint() {
        ncurses_refresh();
    }
    public function add($o) {
        $this->obj[] = $o;
    }
    public function getSize() {
        return count($this->obj);
    }
    public function close() {
        ncurses_end();
    }
}
?>