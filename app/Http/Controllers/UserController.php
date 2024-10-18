<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Payment;
use Payjp\Customer;
use App\Models\Shop;
use App\Models\Book;
use Payjp\Charge;
use Payjp\Payjp;

class UserController extends Controller
{
    public function mypage()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == '0') {

                return view('user.mypage');
            } else if ($usertype == '1') {
                return view('admin.mypage'); //admin.homeで今までの
            } else {
                return redirect()->back();
            }
        }
    }

    public function edit(User $user)
    {

        $user = Auth::user();

        return view('user.edit', compact('user'));
    }

    public function update_mypage(Request $request, User $user)
    {

        $user = Auth::user();

        $user->name = $request->input('name') ? $request->input('name') : $user->name;
        $user->email = $request->input('email') ? $request->input('email') : $user->email;
        $user->postal = $request->input('postal') ? $request->input('postal') : $user->postal;
        $user->address = $request->input('address') ? $request->input('address') : $user->address;
        $user->tell = $request->input('tell') ? $request->input('tell') : $user->tell;
        $user->update();

        return redirect()->back()->with('message', '会員情報が保存されました。');
    }

    public function member()
    {
        $user = Auth::user();
        $defaultCard = Payment::getDefaultcard($user);

        return view('user.member', compact('user', 'defaultCard'));
    }



    public function register_card(Request $request)
    {
        $user = Auth::user();

        $pay_jp_secret = env('PAYJP_SECRET_KEY');
        \Payjp\Payjp::setApiKey($pay_jp_secret);

        $card = [];
        $count = 0;

        if ($user->token != "") {

            $result = \Payjp\Customer::retrieve($user->token);



            $count = $result->cards->all()->count;

            $card = [
                'brand' => $result->cards->data[0]["brand"],
                'exp_month' => $result->cards->data[0]["exp_month"],
                'exp_year' => $result->cards->data[0]["exp_year"],
                'last4' => $result->cards->data[0]["last4"]
            ];
        }

        return view('user.register_card', compact('card', 'count'));
    }

    public function token(Request $request)
    {
        $pay_jp_secret = env('PAYJP_SECRET_KEY');
        \Payjp\Payjp::setApiKey($pay_jp_secret);

        $user = Auth::user();
        $customer = $user->token;
        if (!empty($customer)) {
            $cu = \Payjp\Customer::retrieve($customer);
        }

        if (!empty($cu->cards->data[0]["id"])) {

            $card = $cu->cards->retrieve($cu->cards->data[0]["id"]);
            $card->delete();
            $cu->cards->create(array(
                "card" => request('payjp-token')
            ));
        } else {
            $cu = \Payjp\Customer::create(array(
                "card" => request('payjp-token')
            ));
            $user->token = $cu->id;
            $user->update();
        }

        return redirect('register_card')->with('message', '登録しました');
    }

    public function delete_card(Request $request)
    {
        $pay_jp_secret = env('PAYJP_SECRET_KEY');
        \Payjp\Payjp::setApiKey($pay_jp_secret);

        $user = Auth::user();
        $customer = $user->token;
        $cu = \Payjp\Customer::retrieve($customer);

        $delete_card = $cu->cards->retrieve($cu->cards->data[0]["id"]);
        $delete_card->delete();
        $user->token = '';
        $user->save();
        return view('user.register_card')->with('message', '削除しました');
    }

    public function info()
    {
        $user = Auth::user();
        $defaultCard = Payment::getDefaultcard($user);

        return view('user.member', compact('user', 'defaultCard'));
    }

    public function paid(Request $request)
    {

        $pay_jp_secret = env('PAYJP_SECRET_KEY');
        \Payjp\Payjp::setApiKey($pay_jp_secret);


        $user = User::find(Auth::id());
        $token = $request->input('payjp-token');
        $chargeOject = [
            'amount'      => 500,
            'currency'    => 'jpy',
            'description' => 'ユーザー：' . $user->name . "、有料会員課金分",
            'customer'      => $user->token,
        ];
        $charge = \Payjp\Charge::create($chargeOject);

        //     $charge = \Payjp\Charge::create($chargeOject);
        // } catch (\Payjp\Exception\CardException $e) {
        //     $body = $e->getJsonBody();
        //     $errors  = $body['error'];

        //     return redirect('/user/info')->with('errors', "決済に失敗しました。しばらく経ってから再度お試しください。");
        // }

        $user->status = 1;
        $user->save();

        return redirect('member')->with('success', "有料会員登録が完了しました。");
    }


    public function cancel(Request $request)
    {

        $user = User::find(Auth::id());
        $user->status = 0;
        $user->save();

        return redirect('member')->with('success', "有料会員解約が完了しました。");
    }

    public function user_list()
    {
        $data = User::all();


        return view('admin.user_list', compact('data'));
    }


    public function update_password(Request $request)
    {
        $validatedData = $request->validate([
            'password' => 'required|confirmed',
        ]);

        $user = Auth::user();

        if ($request->input('password') == $request->input('password_confirmation')) {
            $user->password = bcrypt($request->input('password'));
            $user->update();
        } else {
            return to_route('mypage.edit_password');
        }

        return view('user.mypage');
    }

    public function edit_password()
    {
        return view('user.edit_password');
    }

    public function favorite_shop()
    {
        $user = Auth::user();

        $favorites = $user->favorites(Shop::class)->get();

        return view('user.favorite_shop', compact('favorites'));
    }
}
