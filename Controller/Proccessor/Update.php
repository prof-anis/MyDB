<?php

namespace Controller\Proccessor;

use Controller\Proccessor\Processor;
/**
 * 
 */
class Update extends Processor
{
	
	function __construct()
	{
		parent::__construct();

		$this->query = "";

		$this->process();
	}

	public function process()
	{
		$this->query.= " UPDATE  ".$this->db->table." SET ".$this->resolveUpdate();
	}

	public function resolveUpdate()
	{
		$update ="";
		foreach ($this->db->update as $field => $value) {
			$update.=$field." = "."'".$value."'";
		}
		return $update;
	}
}

?>