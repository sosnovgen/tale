<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['name','phone','city','comment','status'];

    public function products()
    {
        return $this-> hasMany('App\Order', 'order_id');
    }

}
