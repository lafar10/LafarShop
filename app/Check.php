<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{

    public $table = "check_order";

    protected $fillable = ['id', 'user_id', 'price_total', 'name',  'phone', 'adresse', 'city','etat'];
}
