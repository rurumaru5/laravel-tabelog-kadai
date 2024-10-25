<?php

namespace App\Http\Controllers;

use App\Models\Search;
use App\Models\Shop;
use App\Models\Category;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // 検索するテキスト取得
        $keyword = $request->input('keyword');
        $query = Shop::query();

        $category_id = $request->input('category_id');

        // 検索するテキストが入力されている場合のみ
        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('description', 'LIKE', "%{$keyword}%");
        }
        //カテゴリIDで一致するのを見つける
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
        $data = $query->orderBy('category_id', 'asc')->paginate(6);

        $category = new Category;
        $categories = $category->getLists();


        return view('home.search', compact('categories', 'data', 'keyword', 'category_id'));
    }

    public function search_category(Request $request)
    {

        // 検索するテキスト取得
        $keyword = $request->input('keyword');
        $query = Category::query();

        // 検索するテキストが入力されている場合のみ
        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('id', 'LIKE', "%{$keyword}%");
        }

        $categorys = $query->get();


        return view('admin.search_category', compact('categorys', 'keyword',));
    }

    public function search_shop(Request $request)
    {

        // 検索するテキスト取得
        $keyword = $request->input('keyword');
        $query = Shop::query();

        // 検索するテキストが入力されている場合のみ
        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('description', 'LIKE', "%{$keyword}%");
        }

        $shops = $query->get();


        return view('admin.search_shop', compact('shops', 'keyword',));
    }

    public function search_book(Request $request)
    {


        $book = User::all();
        // 検索するテキスト取得
        $keyword = $request->input('keyword');
        $query = Book::with(['user:id,name']);

        // 検索するテキストが入力されている場合のみ
        if (!empty($keyword)) {
            $query->join('users', 'users.id', '=', 'books.user_id')
                ->where('name', 'like', '%' . $keyword . '%') //ここ直す
                ->orWhere('book_date', 'LIKE', "%{$keyword}%");
        }

        $books = $query->get();


        return view('admin.search_book', compact('books', 'keyword',));
    }

    public function search_user(Request $request)
    {
        $user = User::all();
        // 検索するテキスト取得
        $keyword = $request->input('keyword');
        $query = User::query();

        // 検索するテキストが入力されている場合のみ
        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('id', 'LIKE', "%{$keyword}%");
        }

        $users = $query->get();


        return view('admin.search_user', compact('users', 'keyword',));
    }
}
