<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategories extends Model
{
    public $timestamps = false;
    protected $table = "kategories";
    // protected $fillable = ['nama_kategori']; //field yang dapat diisi
    protected $guarded = ['id'];
}
