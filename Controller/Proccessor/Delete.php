<?php

namespace Controller\Proccessor;

use Controller\Proccessor\Processor;
/**
 * 
 */
class Delete extends Processor
{
	
	function __construct()
	{
		parent::__construct();

		$this->query="";

		$this->process();
	}


	public function process()
	{
		$this->query.=" DELETE FROM ".$this->db->table;
	}
}

