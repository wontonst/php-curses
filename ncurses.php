<?php
use Entities\Frame;

define('DIR',__DIR__.'/');
include('start.php');

/*
ncurses_init();
ncurses_getmaxyx(STDSCR,$height,$width);
$screen = ncurses_newwin(0,0,0,0);
ncurses_border(0,0,0,0,0,0,0,0);
//for($i = 0; $i != $height; $i++)ncurses_mvaddch($i,0,ord('3'));
//ncurses_bkgd(0);
//ncurses_erase();

ncurses_addch(ord('3'));
ncurses_mvaddch(0,1,ord('3'));
ncurses_mvaddch(0,0,ord('3'));
ncurses_mvaddch(15,40,ord('3'));
ncurses_mvaddch(14,40,ord('3'));
ncurses_mvaddch(13,40,ord('3'));
ncurses_mvaddch(12,40,ord('3'));
ncurses_mvaddch(11,40,ord('3'));


ncurses_refresh();
usleep(1000000);
ncurses_end();
*/

$s = new Frame();
usleep(1000000);
$s->close();

?>