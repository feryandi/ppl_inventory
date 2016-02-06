<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = "booking";
    protected $fillable = ['id_alat', 'id_pengguna', 'mulai', 'selesai', 'keterangan'];

    public $timestamps = false;
}
