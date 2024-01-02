<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servis extends Model
{
    public $timestamps = false;
    protected $table = "servis";
    //protected $fillable = ['nama', 'email', 'no_hp']; //field yang dapat diisi
    protected $guarded = ['id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'mobil_id');
    }

    // public function mobil()
    // {
    //     return $this->belongsTo(Mobil::class, 'mobil_id');
    // }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'montir_id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
