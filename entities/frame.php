<?php

namespace Entities;

class Frame{

private $obj;///<collection of drawables
private $dim;///<dimensions array, holds keys x and y
public function __construct()
{
ncurses_init();
ncurses_getmaxyx(STDSCR,$this->dim['y'],$this->dim['x']);
$screen = ncurses_newwin(0,0,0,0);
ncurses_refresh();
}

public function step()
{
for($i = 0; $i != count($this->obj);$i++)
{
$this->obj[$i]->update();
}
ncurses_refresh();
}

public function close()
{
ncurses_end();
}

}
?>