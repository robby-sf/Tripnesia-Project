<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Reviews; 

class Destination extends Model
{

    protected $fillable =['nama', 'slug', 'deskripsi', 'gambar','maps', 'jam_buka', 'jam_tutup','harga','alamat'];
    
    public function reviews() {
        return $this->hasMany(Reviews::class);
    }
}
