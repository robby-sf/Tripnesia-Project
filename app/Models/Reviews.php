<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Destination;

class Reviews extends Model
{

    protected $fillable = [
        'user_id',
        'destination_id',
        'rating',
        'comment',
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function destination() {
        return $this->belongsTo(Destination::class);
    }
}
