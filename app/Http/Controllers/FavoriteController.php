<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function store($shop_id)
    {
        Auth::user()->favorite($shop_id);
        return back();
    }

    public function destroy($shop_id)
    {

        Auth::user()->unfavorite($shop_id);

        return back();
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $favorite = Favorite::where('user_id', $user_id)->get();
        $shops = Shop::whereIn('id', $favorite->pluck('shop_id'))->get();
        return view('user/user_favorite_shop', compact('shops'));
    }
}
