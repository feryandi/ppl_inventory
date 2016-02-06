<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $table = "alat";
    protected $fillable = ['kode', 'nama', 'deskripsi'];

    public $timestamps = false;
}
