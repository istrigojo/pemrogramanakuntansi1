<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    public $timestamps = true;
    protected $table = "berita";
    // protected $fillable = ['kode_akun', 'nama_akun']; //field yang dapat diisi
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategories()
    {
        return $this->belongsTo(Kategories::class, 'kategories_id');
    }
}
