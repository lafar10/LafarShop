<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ['id', 'user_id', 'product_id', 'price_u', 'name', 'lastname', 'phone', 'adresse', 'city', 'etat'];
}
