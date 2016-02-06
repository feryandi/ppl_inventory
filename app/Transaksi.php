<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = "transaksi";
    protected $fillable = ['id_alat', 'id_pengguna', 'dipinjam', 'dikembalikan', 'keterangan'];

    public $timestamps = false;
}
