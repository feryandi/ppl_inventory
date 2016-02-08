<?php

namespace App\Http\Controllers;

use App\Alat;
use App\Lokasi;
use App\Penyimpanan;
use Request;
use Validator;
use DB;
use App\Http\Controllers\Controller;

date_default_timezone_set('Asia/Jakarta');

class AlatController extends Controller
{
    public function addForm()
    {
        //$alat = Alat::all();

        $lokasi = Lokasi::all();
        return view('alat', ['lokasi' => $lokasi]);
    }

    public function getAvailable() {
        $req = Request::all();
        if (!isset($req['filter'])) {
            $available = Alat::whereNotExists(function($query){
                                    $query->select(DB::raw(1))
                                          ->from('transaksi')
                                          ->where('dikembalikan', '0000-00-00 00:00:00')
                                          ->whereRaw('transaksi.id_alat = alat.id');
                                    })
                                ->whereNotExists(function($query){
                                    $query->select(DB::raw(1))
                                          ->from('booking')
                                          ->where('mulai', '<=', date('Y-m-d H:i:s', time()))
                                          ->where('selesai', '>=', date('Y-m-d H:i:s', time()))
                                          ->whereRaw('booking.id_alat = alat.id');
                                })
                                ->whereNotExists(function($query){
                                    $query->select(DB::raw(1))
                                          ->from('pemeliharaan')
                                          ->where('selesai', '0000-00-00 00:00:00')
                                          ->whereRaw('pemeliharaan.id_alat = alat.id');
                                })
                                ->join('penyimpanan', 'penyimpanan.id_alat', '=', 'alat.id')
                                ->join('lokasi', 'lokasi.id', '=', 'penyimpanan.id_lokasi')
                                ->select('alat.id', 'alat.nama as nama', 'lokasi.nama as lokasi', 'kode')
                                ->get();
            return view('list', ['alat' => $available]);
        }
        else {
            $available = Alat::where('alat.nama', 'like', '%'.$req['filter'].'%')
                                ->whereNotExists(function($query){
                                    $query->select(DB::raw(1))
                                          ->from('transaksi')
                                          ->where('dikembalikan', '0000-00-00 00:00:00')
                                          ->whereRaw('transaksi.id_alat = alat.id');
                                })
                                ->whereNotExists(function($query){
                                    $query->select(DB::raw(1))
                                          ->from('booking')
                                          ->where('mulai', '<=', date('Y-m-d H:i:s', time()))
                                          ->where('selesai', '>=', date('Y-m-d H:i:s', time()))
                                          ->whereRaw('booking.id_alat = alat.id');
                                })
                                ->whereNotExists(function($query){
                                    $query->select(DB::raw(1))
                                          ->from('pemeliharaan')
                                          ->where('selesai', '0000-00-00 00:00:00')
                                          ->whereRaw('pemeliharaan.id_alat = alat.id');
                                })
                                ->join('penyimpanan', 'penyimpanan.id_alat', '=', 'alat.id')
                                ->join('lokasi', 'lokasi.id', '=', 'penyimpanan.id_lokasi')
                                ->select('alat.id', 'alat.nama as nama', 'lokasi.nama as lokasi', 'kode')
                                ->get();
            return view('list', ['alat' => $available]);
        }

    }

    public function getDibooking() {
        $req = Request::all();
        if (isset($req['filter'])) {
            $available = Alat::where('alat.nama', 'like', '%'.$req['filter'].'%')
                                ->whereExists(function($query){
                                    $query->select(DB::raw(1))
                                          ->from('booking')
                                          ->where('mulai', '<=', date('Y-m-d H:i:s', time()))
                                          ->where('selesai', '>=', date('Y-m-d H:i:s', time()))
                                          ->whereRaw('booking.id_alat = alat.id');
                                })
                                ->join('booking', 'booking.id_alat', '=', 'alat.id')
                                ->join('peminjam', 'peminjam.id', '=', 'booking.id_pengguna')
                                ->select('alat.id',
                                    'alat.kode',
                                    'alat.nama as nama',
                                    'booking.mulai as mulai',
                                    'booking.selesai as selesai',
                                    'peminjam.nama as peminjam')
                                ->get();
            return view('dibooking', ['alat' => $available]);
        } else {
            $available = Alat::whereNotExists(function($query){
                                    $query->select(DB::raw(1))
                                          ->from('booking')
                                          ->where('mulai', '<=', date('Y-m-d H:i:s', time()))
                                          ->where('selesai', '>=', date('Y-m-d H:i:s', time()))
                                          ->whereRaw('booking.id_alat = alat.id');
                                     })
                                    ->join('booking', 'booking.id_alat', '=', 'alat.id')
                                    ->join('peminjam', 'peminjam.id', '=', 'booking.id_pengguna')
                                    ->select('alat.id',
                                        'alat.kode',
                                        'alat.nama as nama',
                                        'booking.mulai as mulai',
                                        'booking.selesai as selesai',
                                        'peminjam.nama as peminjam')
                                    ->get();
            return view('dibooking', ['alat' => $available]);
        }
    }

    public function getDipinjam() {
        $req = Request::all();
        if (isset($req['filter'])) {
            $available = Alat::where('alat.nama', 'like', '%'.$req['filter'].'%')
                                ->whereExists(function($query){
                                    $query->select(DB::raw(1))
                                          ->from('transaksi')
                                          ->where('dikembalikan', '0000-00-00 00:00:00')
                                          ->whereRaw('transaksi.id_alat = alat.id');
                                })
                                ->join('transaksi', 'transaksi.id_alat', '=', 'alat.id')
                                ->join('peminjam', 'peminjam.id', '=', 'transaksi.id_pengguna')
                                ->select('alat.id',
                                    'alat.kode',
                                    'alat.nama as nama',
                                    'transaksi.dipinjam as mulai',
                                    'peminjam.nama as peminjam')
                                ->get();
            return view('dipinjam', ['alat' => $available]);
        } else {
            $available = Alat::whereExists(function($query){
                                $query->select(DB::raw(1))
                                      ->from('transaksi')
                                      ->where('dikembalikan', '0000-00-00 00:00:00')
                                      ->whereRaw('transaksi.id_alat = alat.id');
                                })
                                ->join('transaksi', 'transaksi.id_alat', '=', 'alat.id')
                                ->join('peminjam', 'peminjam.id', '=', 'transaksi.id_pengguna')
                                ->select('alat.id',
                                    'alat.kode',
                                    'alat.nama as nama',
                                    'transaksi.dipinjam as mulai',
                                    'peminjam.nama as peminjam')
                                ->get();
            return view('dipinjam', ['alat' => $available]);
        }
    }

    public function getDipelihara() {
        $req = Request::all();
        if (isset($req['filter'])) {
            $available = Alat::where('alat.nama', 'like', '%'.$req['filter'].'%')
                                ->whereExists(function($query){
                                    $query->select(DB::raw(1))
                                          ->from('pemeliharaan')
                                          ->where('selesai', '0000-00-00 00:00:00')
                                          ->whereRaw('pemeliharaan.id_alat = alat.id');
                                })
                                ->join('pemeliharaan', 'pemeliharaan.id_alat', '=', 'alat.id')
                                ->select('alat.id',
                                    'alat.kode',
                                    'alat.nama as nama',
                                    'pemeliharaan.mulai as mulai')
                                ->get();
            return view('dipelihara', ['alat' => $available]);
        } else {
            $available = Alat::whereExists(function($query){
                                    $query->select(DB::raw(1))
                                          ->from('pemeliharaan')
                                          ->where('selesai', '0000-00-00 00:00:00')
                                          ->whereRaw('pemeliharaan.id_alat = alat.id');
                                })
                                ->join('pemeliharaan', 'pemeliharaan.id_alat', '=', 'alat.id')
                                ->select('alat.id',
                                    'alat.kode',
                                    'alat.nama as nama',
                                    'pemeliharaan.mulai as mulai')
                                ->get();
            return view('dipelihara', ['alat' => $available]);
        }
    }

    public function add()
    {
        $input = Request::all();

        $rules = array( 'lokasi' => 'required|exists:lokasi,id',
                        'nama' => 'required',
                        'kode' => 'required' );
        $validator = Validator::make (
            $input,
            $rules
        );

        if($validator->fails()) {

            //return $this->failed(array('message' => $validator->messages()));
            echo "Validation";
            return view('welcome');

        } else {

            $alat = new Alat;
            $alat->fill($input);
            $alat->save();

            $penyimpanan = new Penyimpanan;
            $penyimpanan->id_alat = $alat->id;
            $penyimpanan->id_lokasi = $input['lokasi'];
            $penyimpanan->save();

            //return $this->success();
            //return view('welcome');
            return redirect('/');

        }
    }
}