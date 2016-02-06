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

class BookingController extends Controller
{
    public function all()
    {
        return view('alat', ['alat' => $alat]);
    }

    public function add()
    {
        $input = Request::all();
        $peminjam = Peminjam::select('id')->where('nim/nip', $input['nipnim'])->first();

        $rules = array( 'alat' => 'required|exists:alat,id', 
                        'nipnim' => 'required|exists:peminjam,nim/nip',
                        'mulai_d' => 'required',
                        'mulai_m' => 'required',
                        'mulai_y' => 'required',
                        'mulai_h' => 'required',
                        'mulai_i' => 'required',
                        'selesai_d' => 'required',
                        'selesai_m' => 'required',
                        'selesai_y' => 'required',
                        'selesai_h' => 'required',
                        'selesai_i' => 'required');
        $validator = Validator::make (
            $input,
            $rules
        );

        if($validator->fails()) {

            //return $this->failed(array('message' => $validator->messages()));
            echo "Validation";
            return view('welcome');

        } else {
            $booking_mulai = date('Y-m-d H:i:s', mktime($input['mulai_h'], $input['mulai_i'], 0, $input['mulai_m'], $input['mulai_d'], $input['mulai_y']));
            $booking_selesai = date('Y-m-d H:i:s', mktime($input['selesai_h'], $input['selesai_i'], 0, $input['selesai_m'], $input['selesai_d'], $input['selesai_y']));

            $check = 0;

            /* Cek apakah barang sedang dipinjam oleh orang lain */
            $check += Transaksi::where('id_alat', $input['alat'])
                                ->where('dikembalikan', '0000-00-00 00:00:00')
                                ->count();
                                
            /* Cek apakah barang sudah dibooking oleh orang lain */
            $check += Booking::where('id_alat', $input['alat'])
                                ->where(function($query) use ($booking_mulai, $booking_selesai)
                                {
                                    $query->where('mulai', '>=', $booking_mulai)
                                          ->where('mulai', '<=', $booking_selesai)
                                          ->where('selesai', '>=', $booking_selesai);
                                })
                                ->orwhere(function($query) use ($booking_mulai, $booking_selesai)
                                {
                                    $query->where('mulai', '<=', $booking_mulai)
                                          ->where('selesai', '>', $booking_mulai)
                                          ->where('mulai', '<', $booking_selesai)
                                          ->where('selesai', '>=', $booking_selesai);
                                })
                                ->orwhere(function($query) use ($booking_mulai, $booking_selesai)
                                {
                                    $query->where('mulai', '<=', $booking_mulai)
                                          ->where('selesai', '>=', $booking_mulai)
                                          ->where('selesai', '<=', $booking_selesai);
                                })
                                ->orwhere(function($query) use ($booking_mulai, $booking_selesai)
                                {
                                    $query->where('mulai', '>=', $booking_mulai)
                                          ->where('selesai', '<=', $booking_selesai);
                                })
                                ->count();

            if ($check == 0) {
                $booking = new Booking;
                $booking->id_alat = $input['alat'];
                $booking->id_pengguna = $peminjam->id;
                $booking->mulai = $booking_mulai;
                $booking->selesai = $booking_selesai;
                $booking->save();

                //return $this->success();
                return view('welcome');

            } else {

                //return $this->failed(array('message' => "Barang belum dikembalikan"));
                echo "Barang belum dikembalikan";
                return view('welcome');

            }
        }
    
    }

    public function del()
    {
/*        $input = Request::all();

        $rules = array( 'alat' => 'required|exists:alat,id' );
        $validator = Validator::make (
            $input,
            $rules
        );

        if($validator->fails()) {

            //return $this->failed(array('message' => $validator->messages()));
            echo "Validation";
            return view('welcome');

        } else {

            Transaksi::where('id_alat', $input['alat'])
                      ->where('dikembalikan', '0000-00-00 00:00:00')
                      ->update(['dikembalikan' => date('Y-m-d H:i:s', time())]);

            return view('welcome');

        }*/
    }
}