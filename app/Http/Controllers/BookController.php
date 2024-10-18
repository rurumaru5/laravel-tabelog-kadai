<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

class BookController extends Controller
{
    public function booking_list()
    {
        $data = Book::all();


        return view('admin.booking_list', compact('data'));
    }

    public function user_booking_list()
    {
        $data = Book::where('user_id', \Auth::user()->id)->get();


        return view('user.user_booking_list', compact('data'));
    }



    public function user_update_book($id)
    {

        $book = Book::find($id);

        return view('user.user_booking_list', ['book' => $book]);
    }


    public function delete_book($id)
    {
        $data = Book::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'レビューを削除しました。');
    }
}
