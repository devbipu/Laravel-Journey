<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\District;
use App\Models\User;

class Country extends Model
{
    use HasFactory;

    public function district()
    {
        return $this->hasOne(District::class);
    }


    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
