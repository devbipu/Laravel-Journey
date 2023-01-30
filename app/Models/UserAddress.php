<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Country;
use App\Models\District;


class UserAddress extends Model
{
    use HasFactory;


    // public function user(){
    //     return $this->hasOne(User::class);
    // }
}
