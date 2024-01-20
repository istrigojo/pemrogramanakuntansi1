<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    public $timestamps = true;
    protected $table = "laporan";
    protected $guarded = ['id'];

    public function servis()
    {
        return $this->belongsTo(Servis::class, 'servis_id');
    }
}
