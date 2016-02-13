<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alat extends Model
{
	use SoftDeletes;
    protected $table = "alat";
    protected $fillable = ['kode', 'nama', 'deskripsi'];

    public $timestamps = false;
}
