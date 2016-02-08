<?php

namespace App\Http\Controllers;

use App\Lokasi;
use Validator;
use Request;
use App\Http\Controllers\Controller;

class LokasiController extends Controller
{

    public function add()
    {
        $input = Request::all();

        $rules = array( 'nama' => 'required|unique:lokasi,nama' );
        $validator = Validator::make (
            $input,
            $rules
        );

        if($validator->fails()) {

            //return $this->failed(array('message' => $validator->messages()));
            echo "Validation";
            return view('welcome');

        } else {

            $lokasi = new Lokasi;
            $lokasi->fill($input);
            $lokasi->save();

            //return $this->success();
            return view('welcome');
        }
    }
}