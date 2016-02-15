<?php

namespace App\Http\Controllers;

use App\Lokasi;
use App\Penyimpanan;
use Validator;
use DB;
use Request;
use App\Http\Controllers\Controller;

class LokasiController extends Controller
{
    public function listPage() {
        $lokasi = Lokasi::leftjoin('penyimpanan', 'lokasi.id', '=', 'id_lokasi')
                        ->groupBy('lokasi.id')
                        ->get(['lokasi.id', 'nama', DB::raw('count(id_lokasi) as count')]);

        return view('lokasi', ['lokasi' => $lokasi]);
    }

    public function del($id) {
        $lokasi = Lokasi::where('id', '<>', $id)->get();

        return view('deletelokasi', ['lokasi' => $lokasi, 'id' => $id]);
    }

    public function doDelete($id) {
      $input = Request::all();

      $rules = array( 'lokasi' => 'required|exists:lokasi,id' );
      $validator = Validator::make (
          $input,
          $rules
      );

      if($validator->fails()) {

          return view('error');

      } else {

          $penyimpanan = Penyimpanan::where('id_lokasi', $id)
                                    ->update(["id_lokasi" => $input['lokasi']]);

          $lokasi = Lokasi::find($id);
          $lokasi->delete();

          return redirect('/lokasi');

      }              
    }

    public function edit($id) {
      $input = Request::all();

      $rules = array( 'nama' => 'required' );
      $validator = Validator::make (
          $input,
          $rules
      );

      if($validator->fails()) {

          return view('error');

      } else {

          $lokasi = Lokasi::find($id);
          $lokasi->nama = $input['nama'];
          $lokasi->save();

          return redirect('/lokasi');

      }      
    }

    public function add()
    {
        $input = Request::all();

        $rules = array( 'nama' => 'required|unique:lokasi,nama' );
        $validator = Validator::make (
            $input,
            $rules
        );

        if($validator->fails()) {

            return view('error');

        } else {

            $lokasi = new Lokasi;
            $lokasi->fill($input);
            $lokasi->save();

            return redirect('/lokasi');
        }
    }
}