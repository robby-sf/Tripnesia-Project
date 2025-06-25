<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;

use App\Models\Reviews; 


class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['nama','email','password','role','nomorTelp','profilePicture'];

    public function reviews() {
    return $this->hasMany(Reviews::class);
}

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
