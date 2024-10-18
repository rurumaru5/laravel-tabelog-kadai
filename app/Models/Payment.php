<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public static function setCustomer($token, $user)
    {
        \Stripe\Stripe::setApiKey(\Config::get('payment.stripe_secret_key'));

        //Stripe上に顧客情報をtokenを使用することで保存
        try {
            $customer = \Stripe\Customer::create([
                'card' => $token,
                'name' => $user->name,
                'description' => $user->id
            ]);
        } catch (\Stripe\Exception\CardException $e) {
            /*
             * カード登録失敗時には現段階では一律で別の登録カードを入れていただくように
             * 促すメッセージで統一。
             * カードエラーの類としては以下があるとのこと
             * １、カードが決済に失敗しました
             * ２、セキュリティーコードが間違っています
             * ３、有効期限が間違っています
             * ４、処理中にエラーが発生しました
             *  */
            return false;
        }

        $targetCustomer = null;
        if (isset($customer->id)) {
            $targetCustomer = User::find(Auth::id()); //要するに当該顧客のデータをUserテーブルから引っ張りたい
            $targetCustomer->stripe_id = $customer->id;
            $targetCustomer->update();
            return true;
        }
        return false;
    }


    /**
     * Stripe上の「顧客」情報を更新するための関数
     *
     * @param String $token・・・・・Stripe上のtoken（フロントエンドで作成）
     * @param object $user ・・・・・カード登録をするユーザーの情報
     * @param object $customer・・・Stripe上に登録されている顧客オブジェクト
     * @param object $card・・・・・Stripe上に登録されているクレジットカード情報のオブジェクト
     */
    public static function updateCustomer($token, $user)
    {
        \Stripe\Stripe::setApiKey(\Config::get('payment.stripe_secret_key'));

        try {
            $customer = \Stripe\Customer::retrieve($user->stripe_id);
            $card = $customer->sources->create(['source' => $token]);

            if (isset($customer)) {
                $customer->default_source = $card["id"];
                $customer->save();
                return true;
            }
        } catch (\Stripe\Exception\CardException $e) {
            /*
             * カード登録失敗時には現段階では一律で別の登録カードを入れていただくように
             * 促すメッセージで統一。（メッセージ自体はController側で制御しています）
             * カードエラーの類としては
             * １、カードが決済に失敗しました
             * ２、セキュリティーコードが間違っています
             * ３、有効期限が間違っています
             * ４、処理中にエラーが発生しました
             *  */
            return false;
        }
        return true;
    }

    /**
     * Stripe上に現在登録されている顧客の「使用カード」の情報を取得するための関数
     *
     * @param String $token・・・・・Stripe上のtoken（フロントエンドで作成）
     * @param object $user ・・・・・カード登録をするユーザーの情報
     * @param object $customer・・・Stripe上に登録されている顧客オブジェクト
     * @param object $default_card・・・・・Stripe上から取得した顧客の「使用カード」オブジェクト
     */
    protected static function getDefaultcard($user)
    {
        $pay_jp_secret = env('PAYJP_SECRET_KEY');
        \Payjp\Payjp::setApiKey($pay_jp_secret);

        $default_card = null;

        if ($user->token != "") {

            $card = \Payjp\Customer::retrieve($user->token);

            $count = $card->cards->all()->count;

            $default_card = [
                'brand' => $card->cards->data[0]["brand"],
                'exp_month' => $card->cards->data[0]["exp_month"],
                'exp_year' => $card->cards->data[0]["exp_year"],
                'last4' => $card->cards->data[0]["last4"]
            ];
        }

        return $default_card;
    }

    /**
     * Stripe上に現在登録されている顧客のカード情報を削除するための関数
     *
     * @param object $user ・・・・・カード削除をするユーザーの情報
     * @param object $customer・・・Stripe上に登録されている顧客オブジェクト
     */
    protected static function deleteCard($user)
    {
        \Stripe\Stripe::setApiKey(\Config::get('payment.stripe_secret_key'));
        $customer = \Stripe\Customer::retrieve($user->id);
        $card = $customer->sources->data[0];

        var_dump($card, "カード");
        /* card情報が存在していれば削除 */
        if ($card) {
            \Stripe\Customer::deleteSource(
                $user->id,
                $card->id
            );
            return true;
        }
        return false;
    }
}
