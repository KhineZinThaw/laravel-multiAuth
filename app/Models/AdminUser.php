<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class AdminUser extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'password',
    ];
    
    protected $hidden = [
      'password', 'remember_token',
    ];
}
