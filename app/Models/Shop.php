<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Kyslik\ColumnSortable\Sortable;


class Shop extends Model
{
    use HasFactory, Favoriteable, Sortable;
    public $sortable = ['id', 'name', 'low_price']; // 追加

    protected $fillable = [
        'name',
        'image',
        'description',
        'low_price',
        'high_price',
        'open',
        'close',
        'postal',
        'address',
        'tell',
        'holiday',
        'map',
        'category_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }


    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function book()
    {
        return $this->hasMany(Book::class);
    }

    public function favorite()
    {
        return $this->hasMany('App\Favorite');
    }
}
