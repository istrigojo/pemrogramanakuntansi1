<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Montir extends Model
{
    public $timestamps = true;
    protected $table = "montir";
    protected $guarded = ['id'];

    public function kategori()
    {
        return $this->belongsToMany(Kategori::class, 'montirkategori');
    }
}
