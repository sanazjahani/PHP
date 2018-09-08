<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
class Privilege extends Model
{
    protected $table = 'privileges';
    public function User()
    {
        return $this->hasMany('app\User');
    }

}