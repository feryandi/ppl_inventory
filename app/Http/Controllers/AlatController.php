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

/*        $rules = array( 'name' => 'required', 
                'username' => 'required|min:6|unique:users', 
                'password' => 'required|min:6|confirmed',
                'email' => 'required|email|unique:users' );
        $messages = array('email.unique' => 'An account already exists with this email');
        $validator = Validator::make (
            $input,
            $rules,
            $messages
        );*/

        $alat = new Alat;
        $alat->fill($input);
        $alat->save();

        $penyimpanan = new Penyimpanan;
        $penyimpanan->id_alat = $alat->id;
        $penyimpanan->id_lokasi = $input['lokasi'];
        $penyimpanan->save();


        return view('welcome');
    }
}