<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagkategori extends Model
{
    public $timestamps = false;
    protected $table = "bagkategori";
    // protected $fillable = ['nama_Bagkategori']; //field yang dapat diisi
    protected $guarded = ['id'];
}
