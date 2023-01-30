<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\District;

class Country extends Model
{
    use HasFactory;

    public function district()
    {
        return $this->hasOne(District::class);
    }
}
