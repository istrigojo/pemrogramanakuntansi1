<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = true;
    protected $table = "customer";
    protected $guarded = ['id'];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'mobil_id');
    }
}
