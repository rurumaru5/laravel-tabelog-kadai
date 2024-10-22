<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Category;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('shop.index');
        $shop = Shop::all();
        return view('shop.index', compact('shop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'low_price' => 'required|integer',
                'high_price' => 'required|integer',
                'open' => 'required|date_format:H:i|',
                'close' => 'required|date_format:H:i|after:start_time',
                'postal' => 'required',
                'address' => 'required',
                'tell' => 'required |string',
                'holiday' => 'required|string',
                'map' => 'required',
                'category' => 'required',
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg'
            ],
            [
                'name.required' => '商品名を入力してください。',
                'description.required' => '詳細を入力してください。',
                'low_price.required' => '値段を入力してください。',
                'high_price.required' => '値段を入力してください。',
                'open.required' => '時間を入力してください。',
                'close.required' => '時間を入力してください。',
                'postal.required' => '郵便番号を入力してください。',
                'address.required' => '住所を入力してください。',
                'tell.required' => '電話番号を入力してください。',
                'holiday.required' => '定休日を入力してください。',
                'map.required' => '地図を入力してください。',
                'category.required' => 'カテゴリーを入力してください。',
                'image.required' => '画像を選択してください。'
            ]
        );

        $image = $request->file('image');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        dd($name);

        Shop::create([
            'name' => request('name'),
            'description' => request('description'),
            'low_price' => request('low_price'),
            'high_price' => request('high_price'),
            'open' => request('open'),
            'close' => request('close'),
            'postal' => request('postal'),
            'address' => request('address'),
            'tell' => request('tell'),
            'holiday' => request('holiday'),
            'map' => request('map'),
            'category_id' => request('category'),
            'image' => $name
        ]);

        return redirect()->back()->with('message', '商品情報が追加されました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop, $id)
    {
        return view('shop.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::find($id);
        return view('shop.edit', ['shop' => $shop]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'low_price' => 'required|integer',
                'high_price' => 'required|integer',
                'open' => 'required|date_format:H:i|',
                'close' => 'required|date_format:H:i|after:start_time',
                'postal' => 'required',
                'address' => 'required',
                'tell' => 'required |string',
                'holiday' => 'required|string',
                'map' => 'required',
                'category' => 'required',
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg'
            ],
            [
                'name.required' => '商品名を入力してください。',
                'description.required' => '詳細を入力してください。',
                'low_price.required' => '値段を入力してください。',
                'high_price.required' => '値段を入力してください。',
                'open.required' => '時間を入力してください。',
                'close.required' => '時間を入力してください。',
                'postal.required' => '郵便番号を入力してください。',
                'address.required' => '住所を入力してください。',
                'tell.required' => '電話番号を入力してください。',
                'holiday.required' => '定休日を入力してください。',
                'map.required' => '地図を入力してください。',
                'category.required' => 'カテゴリーを入力してください。',
                'image.required' => '画像を選択してください。'
            ]
        );

        $shop = Shop::find($id);
        $name = $shop->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
        }

        $shop->update([
            'name' => request('name'),
            'description' => request('description'),
            'low_price' => request('low_price'),
            'high_price' => request('high_price'),
            'open' => request('open'),
            'close' => request('close'),
            'postal' => request('postal'),
            'address' => request('address'),
            'tell' => request('tell'),
            'holiday' => request('holiday'),
            'map' => request('map'),
            'category_id' => request('category'),
            'image' => $name
        ]);

        // $shop->name = $request->input('name');
        // $shop->description = $request->input('description');
        // $shop->price = $request->input('price');
        // $shop->category_id = $request->input('category_id');
        // $shop->update();

        return redirect()->route('shop.index')->with('message', '商品情報が更新されました。');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $shop = Shop::find($id);
        $shop->delete();
        return redirect('/shop')->with('message', '商品情報が削除されました。');
    }

    public function shopTop()
    {
        $categories = Category::latest()->get();
        return view('shop.top', ['categories' => $categories]);
    }

    public function favorite(Shop $shop)
    {
        Auth::user()->togglefavorite($shop);

        return back();
    }
}
