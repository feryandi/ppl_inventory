<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyimpanan extends Model
{
    protected $table = "penyimpanan";
    protected $fillable = ['id_alat', 'id_lokasi'];

    public $timestamps = false;
}
