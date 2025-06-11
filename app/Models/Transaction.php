<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // 1. Import SoftDeletes

class Transaction extends Model
{
    use HasFactory, SoftDeletes; // 2. Gunakan SoftDeletes

    protected $fillable = [
        'user_id',
        'package_id',
        'order_id',
        'total_amount',
        'payment_status',
        'snap_token',
        'payment_details',
        'admin_notes', // 3. Tambahkan 'admin_notes'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Package
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
