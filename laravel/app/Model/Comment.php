<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * @package App\Model
 * @property int id
 * @property  int user_id
 * @property  int product_id
 * @property  string content
 *
 */
class Comment extends Model
{
  public function User()
  {
      return  $this->belongsTo('App\User');
  }
    public function product()
    {
        return  $this->belongsTo('App\Model\Product');
    }

}