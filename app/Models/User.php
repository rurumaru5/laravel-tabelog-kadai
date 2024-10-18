<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Overtrue\LaravelFavorite\Traits\Favoriter;
use App\Notifications\CustomVerifyEmail;
use App\Notifications\CustomResetPassword;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasApiTokens, HasFactory, Notifiable, Favoriter;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
    //多対多のリレーションを書く
    public function favorites()
    {
        return $this->belongsToMany(Shop::class, 'favorites', 'user_id', 'shop_id')->withTimestamps();
    }

    public function is_favorite($shopId)
    {
        return $this->favorites()->where('shop_id', $shopId)->exists();
    }

    //isLikeを使って、既にlikeしたか確認したあと、お気に入りする（重複させない）
    public function favorite($shopId)
    {
        if ($this->is_favorite($shopId)) {
            //もし既に「お気に入り」していたら何もしない
        } else {
            $this->favorites()->attach($shopId);
        }
    }

    //isLikeを使って、既にlikeしたか確認して、もししていたら解除する
    public function unfavorite($shopId)
    {
        if ($this->is_favorite($shopId)) {
            //もし既に「お気に入り」していたら消す
            $this->favorites()->detach($shopId);
        } else {
        }
    }

    public function book()
    {
        return $this->hasMany(Book::class);
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail());
    }


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'postal',
        'address',
        'tell'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
