<h2>Overview</h2>

php-curses is a simple-to-use framework for using the PECL extension for the ncurses library.

<h3>Autoloader</h3>
Autoloading is very simple. Simply include start.php and all modules should load automatically. To use specific components, be sure to use the namespace. Take a look at one of the samples as an example.

<h3>Application</h3>
The heart of a php-curses based application is the Entities\Frame class. The add() method may be used on any class that extends Object. The step() function is used to update all objects and repaint the screen.

Here is an example of a basic application that moves a letter 'a' down the screen.

'''php
$frame=new Frame(100000);///<repaint every 100ms
$s = new RandomSpawner(MovingDrawable::S, mt_rand(0,79), 0, 'a',5,5);
$frame->add($s);
for($i = 0; $i != 10000; $i++){//run 10,000 times
$this->frame->step();
}
''';


