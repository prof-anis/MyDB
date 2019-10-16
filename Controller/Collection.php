<?php

namespace Controller;

use ArrayAccess;

/**
 * 
 */
class Collection implements ArrayAccess
{
		

		public $model;

		public $elements;
		
		function __construct($data,$model=null)
		{

			


			

			$this->model = $model;


			if($this->model != null)
			{

				$this->toModel($data);	

				return $this->elements;				
			}

		}


	


			public function isNotMultidimesional($array)
			{

				foreach ($array as $key => $value) {
					if(is_array($value))
					{
						
						$state[]=true;
					}
					else{
						
						$state[]=false;
					}
				}


				return in_array(false, $state);
			}


			public function toModel($attributes)
			{
				
				if(!$this->isNotMultidimesional($attributes))
				{
					foreach($attributes as $key=>$eachAttribute)

					{
					
                    $data=new $this->model;
					$data->attributes=$eachAttribute;
					$this->elements[]=$data;
					}	

				}
				else{

					$data=new $this->model;
					$data->attributes=$attributes;
					$this->elements[]=$data;

				}
			}

	/**
     * Get the value for a given offset.
     *
     * @param  mixed  $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
    	//var_dump($offset);
    	//var_dump($this->elements[$offset]);
        return $this->elements[$offset];
    }

       /**
     * Determine if the given attribute exists.
     *
     * @param  mixed  $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return ! is_null($this->elements[$offset]);
    }

  /**
     * Set the value for a given offset.
     *
     * @param  mixed  $offset
     * @param  mixed  $value
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        //$this->setAttribute($offset, $value);
    }

    /**
     * Unset the value for a given offset.
     *
     * @param  mixed  $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        //unset($this->attributes[$offset], $this->relations[$offset]);
    }			


		
	}