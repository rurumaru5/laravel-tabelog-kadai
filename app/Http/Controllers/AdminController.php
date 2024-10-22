<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Shop;

use App\Models\Category;

use App\Models\Book;

use Illuminate\Support\Facades\Auth;




class AdminController extends Controller
{

    public function index()
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == '0') {
                $data = Shop::paginate(6);;
                return view('user.index', compact('data'));
            } else if ($usertype == '1') {
                return view('admin.home'); //admin.homeで今までの
            } else {
                return redirect()->back();
            }
        }
    }

    public function home()
    {

        $shop  = Shop::all();
        return view('home.index', compact('shop'));
    }

    public function category()
    {
        return view('admin.category');
    }


    public function uploadcategory(Request $request)
    {
        $data = new category;

        $data->name = $request->name;
        $data->save();

        return redirect()->back()->with('message', 'カテゴリーが追加されました。');
    }

    public function shop()
    {
        return view('admin.shop');
    }



    public function uploadshop(Request $request)

    {

        $data = new shop;
        $image = $request->file('image');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);

        // $image = $request->image;
        // $imagename = time() . '.' . $image->getClientOriginalExtension();

        // $request->image->move('shopimage', $imagename);
        // $data->image = $imagename;

        $data->name = $request->name;
        $data->description = $request->description;
        $data->low_price = $request->low_price;
        $data->high_price = $request->high_price;
        $data->open = $request->open;
        $data->close = $request->close;
        $data->postal = $request->postal;
        $data->address = $request->address;
        $data->tell = $request->tell;
        $data->holiday = $request->holiday;
        $data->map = $request->map;
        $data->image = $name;

        $data->category_id = $request->category;

        $data->save();

        return redirect()->back()->with('message', '店舗が追加されました。');
    }

    public function showshop()
    {
        $data = shop::all();

        return view('admin.showshop', compact('data'));
    }

    public function showcategory()
    {
        $data = category::all();

        return view('admin.showcategory', compact('data'));
    }

    public function deleteshop($id)
    {
        $data = shop::find($id);
        $data->delete();
        return redirect()->back()->with('message', '店舗を削除しました。');
    }

    public function deletecategory($id)
    {
        $data = category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'カテゴリを削除しました。');
    }

    public function deletebookview($id)
    {
        $data = Book::find($id);
        $data->delete();
        return redirect()->back()->with('message', '予約を削除しました。');
    }

    public function deleteuser($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'ユーザーを削除しました。');
    }


    public function updateview($id)
    {
        $data = shop::find($id);
        return view('admin.updateview', compact('data'));
    }

    public function updatecategoryview($id)
    {
        $category = Category::find($id);

        return view('admin.updatecategoryview', ['category' => $category]);
    }

    public function updatebookview($id)
    {
        $book = Book::find($id);

        return view('admin.updatebookview', ['book' => $book]);
    }



    public function updateshop(Request $request, $id)
    {

        $data = shop::find($id);

        $dir = 'image';

        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();

        // 取得したファイル名で保存
        // storage/app/public/任意のディレクトリ名/
        $request->file('image')->storeAs('public/' . $dir, $file_name);

        // if ($image) {

        //     $imagename = time() . '.' . $image->getClientOriginalExtension();
        //     $request->image->move('shopimage', $imagename);
        //     $data->image = $imagename;
        // }

        $data->name = $request->name;
        $data->description = $request->description;
        $data->low_price = $request->low_price;
        $data->high_price = $request->high_price;
        $data->open = $request->open;
        $data->close = $request->close;
        $data->postal = $request->postal;
        $data->address = $request->address;
        $data->tell = $request->tell;
        $data->holiday = $request->holiday;
        $data->map = $request->map;

        $data->category_id = $request->category;


        $data->save();

        return redirect()->back()->with('message', '更新が成功ました。');
    }

    public function updatecategory(Request $request, $id)
    {
        $category = category::find($id);
        $category->name = $request->category_name;
        $category->save();

        return redirect()->back()->with('message', '更新が成功ました。');
    }

    public function updatebook(Request $request, $id)
    {
        $book = book::find($id);
        $book->book_date = $request->book_date;
        $book->book_time = $request->book_time;
        $book->number = $request->number;
        $book->save();

        return redirect()->back()->with('message', '更新が成功ました。');
    }
}
