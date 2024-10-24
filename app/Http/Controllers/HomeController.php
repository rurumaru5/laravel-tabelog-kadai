<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Shop;

use App\Models\Book;

use App\Models\Category;

use App\Models\Review;

use App\Models\Search;

use App\Models\Favorite;

use Illuminate\Auth\Events\Authenticated;


class HomeController extends Controller
{

    public function index(Request $request)
    {



        // return view('home.index');
        if (Auth::id()) {
            $data = Shop::sortable()->paginate(6);
            $category = new category;

            $data->name = $request->name;
            $searchWord = $request->input('searchWord');
            $categoryId = $request->input('categoryId');
            $usertype = Auth()->user()->usertype;

            return view('home.index', compact('data', 'searchWord', 'categoryId'));
        } else {
            $data = Shop::sortable()->paginate(6);
            $category = new category;


            $category->name = $request->name;
            $searchWord = $request->input('searchWord');
            $categoryId = $request->input('categoryId');


            return view('home.index', compact('data', 'searchWord', 'categoryId'));
        }
    }

    public function shop_details(Shop $shop, $id)
    {
        $user = Auth::user(); //ここ追加
        $user_id = Auth::id();
        $shop = Shop::find($id);
        $favorite = Favorite::where('user_id', $user_id)->where('shop_id', $shop->id)->exists();
        $number = array();
        $address = new Shop;
        $address->address;

        for ($i = 1; $i < 11; $i++) {
            $number[$i] = $i;
        }
        $reviews = $shop->reviews;


        return view('home.shop_details', compact('user', 'shop', 'reviews', 'user_id', 'favorite'));
    }



    public function add_booking(Request $request, $id)
    {


        $data = new Book;

        $data->user_id = $request->user_id;

        $data->shop_id = $id;

        $data->book_date = $request->book_date;

        $data->book_time = $request->book_time;

        $data->number = $request->number;

        $data->save();

        return redirect()->back()->with('message', '予約しました');
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        $data = Shop::all();
        if ($usertype == '1') {
            return view('admin.home');
        } else {
            $data = Shop::paginate(6);


            return view('home.index');
        }
    }





    public function search()
    {
        $data = Search::get();
        return view('home.search', compact('data'));
    }
}
