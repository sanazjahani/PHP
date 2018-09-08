<?php
namespace app\Model;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package app\Model
 * @property int id
 * @property string title
 * @property string description
 * @property int price
 * @property  int subcat_id
 *
 */
class Product extends Model
{
    protected $table = "products";

    public function Subcat()
    {
        return $this->belongsTo('app\Model\cat');
    }
    public function Comment()
    {
        return $this->hasMany('app\Model\Comment');
    }

};
