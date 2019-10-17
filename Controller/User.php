<?php
namespace Controller;

use Controller\Model;
/**
 *
 */
class User extends Model
{

	protected  $table="users";

	public $fillable=['kk'];
	

  function __construct()
  {

    


  }

  public function society()
  {
  	return $this->hasMany('Controller\Society');
  }



}


 ?>
