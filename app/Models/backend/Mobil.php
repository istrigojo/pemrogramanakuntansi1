<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    public $timestamps = false;
    protected $table = "mobil";
    // protected $fillable = ['kode_akun', 'nama_akun']; //field yang dapat diisi
    protected $guarded = ['id'];
}
