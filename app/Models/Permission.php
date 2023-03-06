<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Role, User};

class Permission extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'slug'];



    /**
     * Connect to Permission table
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }


    /**
     * Connect to User table
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
