<?php
namespace Controller;

use Controller\Model;
/**
 *
 */
class Society extends Model
{
	protected $table = "societies";

  function __construct()
  {

  }

  public function user()
  {
  	return $this->belongsTo('Controller\User') ;
  }




}


 ?>
