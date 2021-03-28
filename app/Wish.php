<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    protected $fillable = ['id', 'user_id', 'product_id', 'status',];


    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
