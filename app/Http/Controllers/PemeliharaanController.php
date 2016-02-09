<?php

namespace App\Http\Controllers;

use App\Alat;
use App\Lokasi;
use App\Penyimpanan;
use App\Peminjam;
use App\Transaksi;
use App\Booking;
use App\Pemeliharaan;
use Request;
use Validator;
use App\Http\Controllers\Controller;

date_default_timezone_set('Asia/Jakarta');

class PemeliharaanController extends Controller
{
    public function add($id)
    {
        $check = 0;

        /* Cek apakah barang sedang dipinjam oleh orang lain */
        $check += Transaksi::where('id_alat', $id)
                            ->where('dikembalikan', '0000-00-00 00:00:00')
                            ->count();

        /* Cek apakah barang sudah dibooking oleh orang lain, kalo dibooking orang tersebut, boleh */
        $check += Booking::where('id_alat', $id)
                            ->where('mulai', '<=', date('Y-m-d H:i:s', time()))
                            ->where('selesai', '>=', date('Y-m-d H:i:s', time()))
                            ->count();

        /* Cek apakah barang sedang dipelihara */
        $check += Pemeliharaan::where('id_alat', $id)
                            ->where('mulai', '<=', date('Y-m-d H:i:s', time()))
                            ->where('selesai', '0000-00-00 00:00:00')
                            ->count();

        if ($check == 0) {
            $pemeliharaan = new Pemeliharaan;
            $pemeliharaan->id_alat = $id;
            $pemeliharaan->mulai = date('Y-m-d H:i:s', time());
            $pemeliharaan->save();

            //return $this->success();
            return view('welcome');

        } else {

            //return $this->failed(array('message' => "Barang belum dikembalikan"));
            echo "Barang tidak tersedia";
            return view('welcome');

        }
    
    }

    public function del($id)
    {
        Pemeliharaan::where('id_alat', $id)
                  ->where('selesai', '0000-00-00 00:00:00')
                  ->update(['selesai' => date('Y-m-d H:i:s', time())]);

        return view('welcome');
    }
}