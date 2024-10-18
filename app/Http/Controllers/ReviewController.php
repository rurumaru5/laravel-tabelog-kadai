<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;


class ReviewController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function review(Request $request)
    {

        $request->validate([
            'comment' => 'required'
        ]);

        $review = new Review();
        $review->comment = $request->input('comment');
        $review->shop_id = $request->input('shop_id');
        $review->user_id = Auth::user()->id;
        $review->score = $request->input('score');
        $review->save();

        return redirect()->back();
    }

    public function show(Shop $shop)
    {
        return view('shop_details.blade.php', compact('shop'));
        $review = $shop->review()->get();

        return view('shop_details.blade.php', compact('shop', 'review'));
    }

    //以下追記
    public function edit_review($id)
    {

        $reviews = Review::find($id);
        $shop_id = $reviews->Shop->id;
        return view('user.edit_review', compact('id', 'shop_id'))->with('review', $reviews);
    }

    public function update_review(Request $request)
    {
        $validate = $request->validate([

            'comment' => 'required',
        ]);
        if (!$validate) {
            return redirect('review/' . $request->id)
                ->withInput()
                ->withErrors($request);
        }
        $reviews = review::find($request->id);


        $reviews->comment = $request->comment;
        $reviews->save();
        return redirect('shop_details/' . $request->shop_id);
    }
    //ここまで

    public function delete_review($id)
    {
        $data = Review::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'レビューを削除しました。');
    }
}
