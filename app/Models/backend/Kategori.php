<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public $timestamps = false;
    protected $table = "kategori";
    // protected $fillable = ['nama_kategori']; //field yang dapat diisi
    protected $guarded = ['id'];

    public function bagkategori()
    {
        return $this->belongsTo(Bagkategori::class, 'bagkategori_id');
    }
}
