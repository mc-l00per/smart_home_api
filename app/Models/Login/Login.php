<?php

namespace App\Models\Login;

use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Login extends User
{
    use SoftDeletes;

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}