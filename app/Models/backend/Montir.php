<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Montir extends Model
{
    public $timestamps = true;
    protected $table = "montir";
    // protected $fillable = ['kode_akun', 'nama_akun']; //field yang dapat diisi
    protected $guarded = ['id'];

    public function kategori()
    {
        return $this->belongsToMany(Kategori::class, 'kategori_id');
    }

    // protected $casts = [
    //     'kategori_id' => 'array',
    // ];
}
