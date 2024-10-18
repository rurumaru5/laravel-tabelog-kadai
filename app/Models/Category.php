<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    //ここ追加
    protected $fillable = ['name'];

    use HasFactory,  Sortable;

    //カテゴリ検索に関わる部分
    public function getLists()
    {
        $categories = Category::pluck('name', 'id');

        return $categories;
    }
    //ここまで

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}
