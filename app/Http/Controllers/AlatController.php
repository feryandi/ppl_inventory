<?php

namespace App\Http\Controllers;

use App\Alat;
use App\Lokasi;
use App\Penyimpanan;
use Request;
use App\Http\Controllers\Controller;

class AlatController extends Controller
{
    public function addForm()
    {
        //$alat = Alat::all();

        $lokasi = Lokasi::all();
        return view('alat', ['lokasi' => $lokasi]);
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
            return view('welcome');

        }
    }
}