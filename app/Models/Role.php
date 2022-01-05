<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    const ROLE_CUSTOMER = 1;
    const ROLE_STAFF = 2;
    const ROLE_ADMIN = 3;
    const ROLE_SUPER_ADMIN = 4;

    public function user() 
    {
        return $this->belongsToMany(User::class,'user_roles', 'role_id', 'user_id');
    }
}
