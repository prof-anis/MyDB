<?php
namespace Controller\Relationships;



trait Relations

{
	public function belongsTo($model,$foriegn_key=null,$local_key='id')
	{
		$modelInstance = new $model;

		if($foriegn_key == null)
		{
			$foriegn_key=$this->getDefaultForiegnKey($this)."_id";
		}
		

		return $modelInstance->where($foriegn_key,$this->attributes[$local_key]);

	}	

	public function hasMany($model,$foriegn_key=null,$local_key='id')
	{
		$modelInstance = new $model;

		if($foriegn_key == null)
		{
			$foriegn_key=$this->getDefaultForiegnKey($modelInstance)."_id";
		}
	

		return $modelInstance->where($local_key,$this->attributes[$foriegn_key]);


	
	}

	
	public function hasOne($model,$foriegn_key=null,$local_key='id')
	{
		$modelInstance = new $model;

		if($foriegn_key == null)
		{
			$foriegn_key=$this->getDefaultForiegnKey($modelInstance)."_id";
		}
	

		return $modelInstance->where($local_key,$this->attributes[$foriegn_key])->orderBY('id','DESC')->limit(1);

	}


	


	public function getDefaultForiegnKey($model)
	{
		return (string) $model;
	}


}





 ?>
