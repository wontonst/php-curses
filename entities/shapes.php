<?php
namespace Entities;

class Shapes{

  public static function LINE($lines)
  {
    $line = array();
    for($i = 0; $i != $lines; $i++)
      $line[] = array('|');
    return $line;
  }
  /*
>>-->
   */
  public static function ARROW($length=2)
  {
    $a = array('>','>');
    for($i = 0; $i != $length;$i++)
      $a[]='-';
    $a[]='>';
    return $a;
  }
}
?>