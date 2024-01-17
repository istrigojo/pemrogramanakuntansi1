<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public $timestamps = true;
    protected $table = "produk";
    // protected $fillable = ['kode_akun', 'nama_akun']; //field yang dapat diisi
    protected $guarded = ['id'];
}
