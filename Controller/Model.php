<?php

/**
 *
 */
 namespace Controller;

 use Controller\DB;
 use ArrayAccess;
 use Exceptions;
 use Controller\BaseModel;



class Model extends BaseModel implements ArrayAccess
{
  public static $db;

  public static $my_table;

  protected  $table;

  public $attributes;

  public $counter = 0;

  function __construct()
  {


  }

  public static function __callStatic($method,$argument)
  {

      self::$db=DB::getInstance();

      self::$db->table=get_class_vars(get_class(new static))['table'];

      self::$db->model=static::class;

    return self::$db->{$method}(...$argument);
  }

  public  function __call($method,$argument)
  {

    self::$db=DB::getInstance();

    $model=new static;

     self::$db->model=static::class;

  self::$db->table=$model->getTableName();//get_class_vars(get_class(new static))['table'];

    return self::$db->{$method}(...$argument);
  }


  public static function table()
  
  {

    return self::$table;


  }

  public function __get($variable)
  { 


    if(isset($this->attributes[$variable]))
    {
      return $this->attributes[$variable];
    }

    elseif(method_exists($this, $variable))
    {

       return $this->$variable()->get();
    }
    
    return "ll";
    
  }

  public function __set($variable,$value)
  {
    $this->attributes[$variable] = $value;
  }

  public function getTableName()
  {
    return $this->table;
  }


  /**
     * Get the value for a given offset.
     *
     * @param  mixed  $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->attributes[$offset];
    }

       /**
     * Determine if the given attribute exists.
     *
     * @param  mixed  $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return ! is_null($this->attributes[$offset]);
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
        $this->attributes[$offset] =  $value;
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

    public function save()
    {
      // i want to check first if the attributes are complete. i would use the fillable property

      
      $db = DB::getInstance();

      return $db->insert($this->attributes);

    }

    public function __toString()
    {
      $array=explode("\\",get_class($this));

      return strtolower($array[count($array) -1 ]);
    }







  







}



 ?>
