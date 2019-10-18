<?php
namespace Controller;


/**
 * 
 */
class BaseCollection
{

	public function sum($field)
	{
		$sum=0;

		foreach ($this->attributes as $key => $value) {
			
			$sum = $sum + int($value[$field]);

		}

		return $sum;
	}
}

?>