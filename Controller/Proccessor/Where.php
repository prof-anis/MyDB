<?php

namespace Controller\Proccessor;


use Controller\Proccessor\Processor;
class Where   extends Processor
{
  public $where;

  public $query;

  function __construct()
  {
    parent::__construct();

    $this->where=$this->db->where;
    $this->query=" WHERE ";
    $this->process();
  //  dd($where);
  //  return $this->retrieve();

  }
  public function process ()
  {
      
    //check first if a where clause was sent at all

    if($this->where == null)
    {
      $this->query='';
      
      return $this->query;
    }
        foreach($this->where as $value=>$where)
        {
         
         $counter=1;
          
          if(is_array($where))
          {
            if(count($where) == 2 && !is_array($where[0])  && !is_array($where[1]))
            { //we assume the user has put in the field and the value with an equal to
              $this->query.=$where[0]."  =  ".$where[1];
            }
            //here we assume that the developer has put in the field, the logical operator and the value
            elseif (count($where) == 3) {

              $this->query.=$where[0]." ".$where[1]." ".$where[2];

            }
            //here we assume that the developer is entering an array of all where. we need to access each array and break them down too
            elseif(count($where) == 2 & is_array($where[0])  && is_array($where[1]))
            {
              $this->resolveArrayEntry($where);
            }
          }


          if($counter < count($this->where))
          {
            $this->query.=" AND ";
          }


          $counter++;

        }
        return $this;
      }


    public function resolveArrayEntry(array $many_where)
    {
      $sql=[];
      foreach ($many_where as $key => $where) 
      {

        $sql[]=$where[0]." ".$where[1]." ".$where[2]." ";
      

      }
     
     
      $this->query.=implode(' AND ', $sql);

    }




}



 ?>
