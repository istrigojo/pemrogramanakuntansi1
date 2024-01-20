<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public $timestamps = true;
    protected $table = "transaksi";
    protected $guarded = ['id'];

    public function servis()
    {
        return $this->belongsTo(Servis::class, 'servis_id', 'customer_id', 'user_id', 'kategori_id', 'montir_id', 'produk_id');
    }

    public function akun()
    {
        return $this->belongsTo(Akun::class, 'akun_id');
    }
}
