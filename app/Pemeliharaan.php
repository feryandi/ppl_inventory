<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemeliharaan extends Model
{
    protected $table = "pemeliharaan";
    protected $fillable = ['id_alat', 'mulai', 'selesai', 'status'];

    public $timestamps = false;
}
