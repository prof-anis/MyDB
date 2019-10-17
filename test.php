<?php


require "vendor/autoload.php";

use Controller\User;
use Controller\Society;

/**
 *
 */
function dd($value)
{
  var_dump($value);
  exit;
}

 function resetClass($object)
	{
		$class_properties=get_object_vars($object);


		
		foreach ($object as $key => $value) {

		$object->$key = null;

		}
	}	









//$pp=User::get();


$jj=User::where('id',20)->first()->society;




dd($jj);