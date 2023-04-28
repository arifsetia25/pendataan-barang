<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'id_jenis_barang',
        'nama_barang',
        'id_supplier',
    ];
}
