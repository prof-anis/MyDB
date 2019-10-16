<?php


require "vendor/autoload.php";

use Controller\User;

/**
 *
 */
function dd($value)
{
  var_dump($value);
  exit;
}









//$pp=User::where('id',"!=","null")->update(['username'=>'anis']);
$rr=User::delete();
//$rr=User::select('username')->get();
dd($rr);

//dd($pp);
foreach ($pp as $key => $value) {

	var_dump($value);
	//var_dump($value['first_name']);
}
exit();

for ($i=0; $i < count ($pp); $i++) { 
	//var_dump($pp[$i]);
}



 
