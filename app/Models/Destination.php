<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable =['nama', 'slug', 'deskripsi', 'gambar','maps', 'jam_buka', 'jam_tutup','harga','alamat'];
}
