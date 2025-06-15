<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    protected $fillable = ['nama','email','password','role','nomorTelp','profilePicture'];
}
