<?php

namespace Controller\Proccessor;
use Controller\Proccessor\Processor;
class Limit extends Processor
{
	function __construct()
	{
		parent::__construct();
		$this->query='';

		

		if($this->isSelect())
		{
			$this->process();
		}
	}

	public function process()
	{
		if($this->db->limit != null)
		{
			$this->query.=" LIMIT ".$this->db->limit;
		}
		
	}

	public function isSelect()
	{
		return ($this->db->isInsert == null);
	}
}