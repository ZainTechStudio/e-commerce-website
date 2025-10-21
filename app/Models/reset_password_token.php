<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reset_password_token extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'password_resets';
}
