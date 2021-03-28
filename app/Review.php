<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = ['id', 'value', 'comments', 'id_user', 'product_id'];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
