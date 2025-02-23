<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Selamat extends Model
{
    protected $table = 'selamat';

    protected $fillable = [
        'nama_pengirim',
        'pesan',
        'balasan',
    ];
}
