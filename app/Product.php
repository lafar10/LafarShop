<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public $table = "products";

    protected $fillable = ['id', 'marque', 'title', 'description', 'pic', 'quantity', 'price', 'promotion', 'price_promos', 'id_cat'];
}
