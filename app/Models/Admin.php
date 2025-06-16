<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['nama','email','alamat','password','tanggal_lahir','role','nomor_telp','profilePicture'];
}
