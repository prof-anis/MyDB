<?php


require "vendor/autoload.php";

class_alias(Controller\User::class,'JJ');
/**
 *
 */
function dd($value)
{
  var_dump($value);
  exit;
}
 use JJ;



$tryer=new JJ;
//$a=DB::getInstance();
//$a->query="hello world!";
//$b=DB::getInstance();
//var_dump($b);

var_dump(JJ::last());



 ?>
