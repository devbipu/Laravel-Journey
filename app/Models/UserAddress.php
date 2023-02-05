<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Scopes\UserDataByAddressScope;

use App\Models\{
    User, UserAddress, Country, District
};

class UserAddress extends Model
{
    use HasFactory;

    //Global Scope

    protected static function booted()
    {
        static::addGlobalScope(new UserDataByAddressScope(['user', 'country', 'district']));
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    // //scops
    // public function scopeUserAdressId($q, $d)
    // {
    //     return $q->whereUserAddressId($d);
    // }
}
