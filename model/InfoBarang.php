<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoBarang extends Model
{
    use HasFactory;

    protected $fillable =[
        'id_barang_masuk',
        'id_jenis_barang',
        'stok',
        'rak_barang',
        
    ];  
}
