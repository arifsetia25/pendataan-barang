<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'id_barang_masuk',
        'id_jenis_barang',
        'jumlah',
        'penjamin',
    ];
}
