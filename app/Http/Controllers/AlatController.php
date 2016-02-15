<?php

namespace App\Http\Controllers;

use App\Alat;
use App\Peminjam;
use App\Lokasi;
use App\Penyimpanan;
use App\Transaksi;
use App\Pemeliharaan;
use Request;
use Validator;
use DB;
use App\Http\Controllers\Controller;

date_default_timezone_set('Asia/Jakarta');

class AlatController extends Controller
{ 
    public function alat($id) {
        $alat = Alat::where('alat.id', '=', $id)
                      ->join('penyimpanan', 'penyimpanan.id_alat', '=', 'alat.id')
                      ->join('lokasi', 'lokasi.id', '=', 'penyimpanan.id_lokasi')
                      ->select('alat.id as id', 'alat.nama as nama', 'lokasi.nama as lokasi', 'kode')
                      ->get();

        $is_available = Alat::where('alat.id', '=', $id)
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
                            ->count();

        $is_maintenance = Alat::where('alat.id', '=', $id)
                                ->whereNotExists(function($query){
                                    $query->select(DB::raw(1))
                                          ->from('pemeliharaan')
                                          ->where('selesai', '0000-00-00 00:00:00')
                                          ->whereRaw('pemeliharaan.id_alat = alat.id');
                                })
                                ->count();

        $history_t = Transaksi::where('id_alat', '=', $id)
                            ->join('peminjam', 'transaksi.id_pengguna',  '=', 'peminjam.id')
                            ->select('dipinjam', 'dikembalikan', 'nim/nip as id', 'nama')
                            ->get();

        $history_m = Pemeliharaan::where('id_alat', '=', $id)
                            ->get();

        return view('deskripsialat', ['alat' => $alat, 'is_available' => $is_available, 'is_maintenance' => $is_maintenance, 'history_t' => $history_t, 'history_m' => $history_m]);
    }

    public function getEdit($id) {
      $lokasi = Lokasi::all();
      $alat = Alat::where('alat.id', '=', $id)
                    ->join('penyimpanan', 'penyimpanan.id_alat', '=', 'alat.id')
                    ->select('alat.id as id', 'nama', 'kode', 'id_lokasi')
                    ->get();
      return view('editalat', ['alat' => $alat[0], 'lokasi' => $lokasi]);  
    }

    public function edit() {
      $input = Request::all();

      $rules = array( 'id' => 'required|exists:alat,id',
                      'lokasi' => 'required|exists:lokasi,id',
                      'nama' => 'required',
                      'kode' => 'required' );
      $validator = Validator::make (
          $input,
          $rules
      );

      if($validator->fails()) {

          return view('error');

      } else {

          $alat = Alat::find($input['id']);
          $alat->nama = $input['nama'];
          $alat->kode = $input['kode'];
          $alat->save();

          $penyimpanan = Penyimpanan::where('id_alat', '=', $input['id'])->first();
          $penyimpanan->id_lokasi = $input['lokasi'];
          $penyimpanan->save();

          return redirect('/');

      }      
    }

    public function delete($id) {
      $alat = Alat::where('alat.id', '=', $id);
      $alat->delete();

      return redirect('/');
    }

    public function addForm()
    {
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
                                          //->where('mulai', '<=', date('Y-m-d H:i:s', time()))
                                          //->where('selesai', '>=', date('Y-m-d H:i:s', time()))
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
            $available = Alat::whereExists(function($query){
                                    $query->select(DB::raw(1))
                                          ->from('booking')
                                          //->where('mulai', '<=', date('Y-m-d H:i:s', time()))
                                          //->where('selesai', '>=', date('Y-m-d H:i:s', time()))
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
                                ->where('transaksi.dikembalikan', '0000-00-00 00:00:00')
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
                                ->where('transaksi.dikembalikan', '0000-00-00 00:00:00')
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
                                ->where('pemeliharaan.selesai', '0000-00-00 00:00:00')
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
                                ->where('pemeliharaan.selesai', '0000-00-00 00:00:00')
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

            return view('error');

        } else {

            $alat = new Alat;
            $alat->fill($input);
            $alat->save();

            $penyimpanan = new Penyimpanan;
            $penyimpanan->id_alat = $alat->id;
            $penyimpanan->id_lokasi = $input['lokasi'];
            $penyimpanan->save();

            return redirect('/');

        }
    }

    public function statistik() {
      $peminjaman = Transaksi::join('alat', 'transaksi.id_alat', '=', 'alat.id')
                              ->select(DB::raw('count(*) as y, alat.nama as name'))
                              ->groupBy('alat.nama')
                              ->get();

      return view('statistik', ['statistik_all' => $peminjaman]);
    }

    public function statistik_kerusakan_all() {
      $peminjaman = Pemeliharaan::join('alat', 'pemeliharaan.id_alat', '=', 'alat.id')
                              ->select(DB::raw('count(*) as y, alat.nama as name'))
                              ->groupBy('alat.nama')
                              ->get();

      return view('statistik_kerusakan', ['statistik_all' => $peminjaman]);
    }

    public function statistik_user_intro() {
      return view('statistik_select_user');
    }

    public function statistik_user_redirector() {
      $input = Request::all();
      $peminjaman = NULL;

      $peminjam = Peminjam::where('nim/nip', '=', $input['nim/nip'])
                          ->select('id')
                          ->first();
      return redirect('/statistik/user/' . $peminjam['id']);
    }

    public function statistik_user_all($id) {
      $peminjam = Peminjam::where('id', '=', $id)
                          ->select('nama', 'nim/nip')
                          ->first();

      $peminjaman = Transaksi::join('alat', 'transaksi.id_alat', '=', 'alat.id')
                              ->where('transaksi.id_pengguna', '=', $id)
                              ->select(DB::raw('count(*) as y, alat.nama as name'))
                              ->groupBy('alat.nama')
                              ->get();

      return view('statistik_user', ['statistik_all' => $peminjaman, 'peminjam' => $peminjam]);
    }

    public function statistik_frekuensi() {
        $input = Request::all();
        $peminjaman = NULL;

        if($input["type"] == "all") {
            // statistik penggunaan semua barang
            $peminjaman = Transaksi::join('alat', 'transaksi.id_alat', '=', 'alat.id')
                                    ->select(DB::raw('count(*) as y, alat.nama as name'))
                                    ->groupBy('alat.nama')
                                    ->get();

        } else if(is_numeric($input["type"])) {
            // statistik penggunaan per item
            $peminjaman = Transaksi::join('alat', 'transaksi.id_alat', '=', 'alat.id')
                                    ->where('alat.id', '=', $input['type'])
                                    ->select(DB::raw('count(*) as y, alat.id as name'))
                                    ->groupBy('alat.id')
                                    ->get();

        } else {
            // statistik penggunaan per kategori
            $peminjaman = Transaksi::join('alat', 'transaksi.id_alat', '=', 'alat.id')
                                    ->where('alat.nama', '=', $input['type'])
                                    ->select(DB::raw('count(*) as y, alat.id as name'))
                                    ->groupBy('alat.id')
                                    ->get();

        }
        return view('statistik', ['statistik_all' => $peminjaman]);
    }

    public function statistik_kerusakan() {
        $input = Request::all();
        $peminjaman = NULL;

        if($input["type"] == "all") {
            // statistik penggunaan semua barang
            $peminjaman = Pemeliharaan::join('alat', 'pemeliharaan.id_alat', '=', 'alat.id')
                                    ->select(DB::raw('count(*) as y, alat.nama as name'))
                                    ->groupBy('alat.nama')
                                    ->get();

        } else if(is_numeric($input["type"])) {
            // statistik penggunaan per item
            $peminjaman = Pemeliharaan::join('alat', 'pemeliharaan.id_alat', '=', 'alat.id')
                                    ->where('alat.id', '=', $input['type'])
                                    ->select(DB::raw('count(*) as y, alat.id as name'))
                                    ->groupBy('alat.id')
                                    ->get();

        } else {
            // statistik penggunaan per kategori
            $peminjaman = Pemeliharaan::join('alat', 'pemeliharaan.id_alat', '=', 'alat.id')
                                    ->where('alat.nama', '=', $input['type'])
                                    ->select(DB::raw('count(*) as y, alat.id as name'))
                                    ->groupBy('alat.id')
                                    ->get();

        }
        return view('statistik', ['statistik_all' => $peminjaman]);
    }

    public function statistik_user() {
        $input = Request::all();
        $peminjaman = NULL;

        if($input["type"] == "all") {
            // statistik penggunaan semua barang
            $peminjaman = Transaksi::join('alat', 'transaksi.id_alat', '=', 'alat.id')
                                    ->where('transaksi.id_pengguna', '=', $input['id'])
                                    ->select(DB::raw('count(*) as y, alat.nama as name'))
                                    ->groupBy('alat.nama')
                                    ->get();

        } else if(is_numeric($input["type"])) {
            // statistik penggunaan per item
            $peminjaman = Transaksi::join('alat', 'transaksi.id_alat', '=', 'alat.id')
                                    ->where('transaksi.id_pengguna', '=', $input['id'])
                                    ->where('alat.id', '=', $input['type'])
                                    ->select(DB::raw('count(*) as y, alat.id as name'))
                                    ->groupBy('alat.id')
                                    ->get();

        } else {
            // statistik penggunaan per kategori
            $peminjaman = Transaksi::join('alat', 'transaksi.id_alat', '=', 'alat.id')
                                    ->where('transaksi.id_pengguna', '=', $input['id'])
                                    ->where('alat.nama', '=', $input['type'])
                                    ->select(DB::raw('count(*) as y, alat.id as name'))
                                    ->groupBy('alat.id')
                                    ->get();

        }
        return view('statistik', ['statistik_all' => $peminjaman]);
    }
}