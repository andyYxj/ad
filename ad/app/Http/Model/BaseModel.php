<?php


namespace App\Http\Model;

use Log;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model{

    public $unixtime;

    public function fromDateTime($value){
        if($this->unixtime){return strtotime(parent::fromDateTime($value));}
    }

    public function pageLimit(){
        return \Config::get('system.page_limit');
    }
        
    public function object_array($array) {  
        if(is_object($array)) {  
            $array = (array)$array;  
         } if(is_array($array)) {  
             foreach($array as $key=>$value) {  
                 $array[$key] = $this->object_array($value);  
                 }  
         }  
         return $array;  
    }

}
