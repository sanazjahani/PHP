<?php
 namespace app\Model;
use Illuminate\Database\Eloquent\Model ;

/**
 * Class Cat
 * @package app\Model
 * @property int id
 * @property string name
 */

class Cat extends Model
{
    protected $table = "cats";
    public function Subcat(){
        return $this ->hasMany('app\Model\cat');
    }
}
