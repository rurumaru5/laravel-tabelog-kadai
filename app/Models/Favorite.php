<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
