<?php

namespace App\Http\Controllers;

use App\Alat;
use App\Lokasi;
use App\Penyimpanan;
use App\Peminjam;
use App\Transaksi;
use App\Booking;
use Request;
use Validator;
use App\Http\Controllers\Controller;

date_default_timezone_set('Asia/Jakarta');

class TransaksiController extends Controller
{
    public function add()
    {
        $input = Request::all();
        $peminjam = Peminjam::select('id')->where('nim/nip', $input['nipnim'])->first();

        $rules = array( 'alat' => 'required|exists:alat,id', 
                        'nipnim' => 'required|exists:peminjam,nim/nip');
        $validator = Validator::make (
            $input,
            $rules
        );

        if($validator->fails()) {

            //return $this->failed(array('message' => $validator->messages()));
            echo "Validation";
            return view('welcome');

        } else {
            $check = 0;

            /* Cek apakah barang sedang dipinjam oleh orang lain */
            $check += Transaksi::where('id_alat', $input['alat'])
                                ->where('dikembalikan', '0000-00-00 00:00:00')
                                ->count();

            /* Cek apakah barang sudah dibooking oleh orang lain, kalo dibooking orang tersebut, boleh */
            $check += Booking::where('id_alat', $input['alat'])
                                ->where('id_pengguna', '<>', $peminjam->id)
                                ->where('mulai', '<=', date('Y-m-d H:i:s', time()))
                                ->where('selesai', '>=', date('Y-m-d H:i:s', time()))
                                ->count();

            if ($check == 0) {
                $transaksi = new Transaksi;
                $transaksi->id_alat = $input['alat'];
                $transaksi->id_pengguna = $peminjam->id;
                $transaksi->dipinjam = date('Y-m-d H:i:s', time());
                $transaksi->save();

                //return $this->success();
                return view('welcome');

            } else {

                //return $this->failed(array('message' => "Barang belum dikembalikan"));
                echo "Barang belum dikembalikan";
                return view('welcome');

            }
        }
    
    }

    public function del($id)
    {
        Transaksi::where('id_alat', $id)
                  ->where('dikembalikan', '0000-00-00 00:00:00')
                  ->update(['dikembalikan' => date('Y-m-d H:i:s', time())]);

        return view('welcome');
    }
}