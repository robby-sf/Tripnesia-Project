<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\AdminResetPasswordNotification;



class Admin extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['nama','email','alamat','password','tanggal_lahir','role','nomor_telp','profilePicture'];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }
}

