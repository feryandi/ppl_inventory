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

class BookingController extends Controller
{
    public function all()
    {
        return view('alat', ['alat' => $alat]);
    }

    public function add($id)
    {
        $input = Request::all();
        $peminjam = Peminjam::select('id')->where('nim/nip', $input['nipnim'])->first();

        $rules = array( 'nipnim' => 'required|exists:peminjam,nim/nip',
                        'mulai' => 'required',
                        'selesai' => 'required'
                    );
        $validator = Validator::make (
            $input,
            $rules
        );

        if($validator->fails()) {

            //return $this->failed(array('message' => $validator->messages()));
            echo "Validation";
            return view('error');

        } else {
            $booking_mulai = date('Y-m-d H:i:s', strtotime($input['mulai']));
            $booking_selesai = date('Y-m-d H:i:s', strtotime($input['selesai']));

            $check = 0;

            /* Cek apakah barang sedang dipinjam oleh orang lain */
            $check += Transaksi::where('id_alat', $id)
                                ->where('dikembalikan', '0000-00-00 00:00:00')
                                ->count();
                                
            /* Cek apakah barang sudah dibooking oleh orang lain */
            $check += Booking::where('id_alat', $id)
                                ->where(function($query) use ($booking_mulai, $booking_selesai)
                                {
                                    $query->where(function($query) use ($booking_mulai, $booking_selesai)
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
                                    });
                                })
                                ->count();

                /* Cek apakah barang sedang dipelihara */
                $check += Pemeliharaan::where('id_alat', $id)
                                    ->where('mulai', '<=', $booking_mulai)
                                    ->where('selesai', '0000-00-00 00:00:00')
                                    ->count();

            if ($check == 0) {
                $booking = new Booking;
                $booking->id_alat = $id;
                $booking->id_pengguna = $peminjam->id;
                $booking->mulai = $booking_mulai;
                $booking->selesai = $booking_selesai;
                $booking->save();

                //return $this->success();
                return redirect('/dibooking');

            } else {

                //return $this->failed(array('message' => "Barang belum dikembalikan"));
                echo "Barang belum dikembalikan" . $id;
                return view('error');

            }
        }
    
    }

    public function transfer($id) {
        $book = Booking::where('id_alat', $id)->first();
        $transaksi = new Transaksi;
        $transaksi->id_alat = $book->id_alat;
        $transaksi->id_pengguna = $book->id_pengguna;
        $transaksi->dipinjam = $book->mulai;
        $transaksi->save();

        $book->delete();   

        return redirect('/dipinjam');
    }

    public function del($id)
    {
        $book = Booking::where('id_alat', $id);
        $book->delete();

        return redirect('/dibooking');
    }
}