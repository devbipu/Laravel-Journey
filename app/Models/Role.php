<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Permission, User};

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];



    /**
     * Connect to Permission table
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }


    /**
     * Connect to User table
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
