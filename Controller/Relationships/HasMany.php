<?php
namespace Controller\Relationships;



trait HasMany

{
	public function belongsTo($model)
	{

	}	

	public function hasMany($model,$foriegn_key=null,$local_key='id')
	{
		if($foriegn_key == null)
		{
			$foriegn_key=$this->getDefaultForiegnKey()."_id";
		}
		$modelInstance = new $model;

		return $modelInstance->where($local_key,$this->attributes[$foriegn_key]);


	
	}

	public function getDefaultForiegnKey()
	{
		return (string) $this;
	}


}





 ?>
