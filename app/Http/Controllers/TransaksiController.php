<?php

namespace App\Http\Controllers;

use App\Alat;
use App\Lokasi;
use App\Penyimpanan;
use App\Pemeliharaan;
use App\Peminjam;
use App\Transaksi;
use App\Booking;
use Request;
use Validator;
use App\Http\Controllers\Controller;

date_default_timezone_set('Asia/Jakarta');

class TransaksiController extends Controller
{
    public function add($id)
    {
        $input = Request::all();
        $peminjam = Peminjam::select('id')->where('nim/nip', $input['nipnim'])->first();

        $rules = array( 'nipnim' => 'required|exists:peminjam,nim/nip');
        $validator = Validator::make (
            $input,
            $rules
        );

        if($validator->fails()) {

            //return $this->failed(array('message' => $validator->messages()));
            echo "Validation";
            return view('error');

        } else {
            $check = 0;

            /* Cek apakah barang sedang dipinjam oleh orang lain */
            $check += Transaksi::where('id_alat', $id)
                                ->where('dikembalikan', '0000-00-00 00:00:00')
                                ->count();

            /* Cek apakah barang sudah dibooking oleh orang lain, kalo dibooking orang tersebut, boleh */
            $check += Booking::where('id_alat', $id)
                                ->where('id_pengguna', '<>', $peminjam->id)
                                ->where('mulai', '<=', date('Y-m-d H:i:s', time()))
                                ->where('selesai', '>=', date('Y-m-d H:i:s', time()))
                                ->count();

            /* Cek apakah barang sedang dipelihara */
            $check += Pemeliharaan::where('id_alat', $id)
                                ->where('mulai', '<=', date('Y-m-d H:i:s', time()))
                                ->where('selesai', '0000-00-00 00:00:00')
                                ->count();

            if ($check == 0) {
                $transaksi = new Transaksi;
                $transaksi->id_alat = $id;
                $transaksi->id_pengguna = $peminjam->id;
                $transaksi->dipinjam = date('Y-m-d H:i:s', time());
                $transaksi->save();

                //return $this->success();
                //return view('error');
                return redirect('/dipinjam');

            } else {

                //return $this->failed(array('message' => "Barang belum dikembalikan"));
                echo "Barang belum dikembalikan";
                return view('error');

            }
        }
    
    }

    public function del($id)
    {
        Transaksi::where('id_alat', $id)
                  ->where('dikembalikan', '0000-00-00 00:00:00')
                  ->update(['dikembalikan' => date('Y-m-d H:i:s', time())]);

        return redirect('/dipinjam');
    }
}