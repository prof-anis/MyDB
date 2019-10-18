<?php

namespace Controller;

use ArrayAccess;
use Iterator;
use Controller\BaseCollection;

/**
 * 
 */
class Collection extends BaseCollection implements ArrayAccess,Iterator
{
		

		public $model;

		public $elements;

		public $counter;
		
		function __construct($data,$model=null)
		{

			
			$this->counter =0;

			

			$this->model = $model;


			if($this->model != null)
			{

				$this->toModel($data);	

				return $this->elements;				
			}

		}


	


			public function isNotMultidimesional($array)
			{
				if(is_array($array)){

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

				return null;
				
			}


			public function toModel($attributes)
			{

				if(is_array($attributes))
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

			else{
				
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


		


	public function next()
	{
		++$this->counter;
	}

	public function rewind()
	{
		$this->counter = 0;

	}

	public function current()
	{
		return $this->elements[$this->counter];
	}

	public function key()
	{
		return $this->counter;
	}

	public function valid()
	{
		return isset($this->elements[$this->counter]);
	}

}