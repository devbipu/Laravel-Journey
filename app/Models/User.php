<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\{
    Country, Image, UserAddress, District
};

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeUserAddId($q, $v){
        return $q->whereUserAddressId($v);
    }

    //scops
    public function scopeUserAdressId($q, $d)
    {
        return $q->whereIn('user_address_id', $d);
    }

    /**
     * Make relation with address table by user address id
     */
    public function address()
    {
        return $this->hasOne(UserAddress::class);
    }


    public function country()
    {
        return $this->hasManyThrough(Country::class, UserAddress::class);
    }

    public function userCountry()
    {
        return $this->belongsToMany(Country::class, 'country_user', 'user_id', 'country_id');
        //->withPivot('status')->withTimestamps();
    }


    public function image()
    {
        return $this->morphMany(Image::class, 'imagable');
    }
}
