<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = ['nama','email','alamat','password','tanggal_lahir','role','nomor_telp','profilePicture'];
}
