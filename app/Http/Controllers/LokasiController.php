<?php

namespace App\Http\Controllers;

use App\Lokasi;
use Request;
use App\Http\Controllers\Controller;

class LokasiController extends Controller
{

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

        $lokasi = new Lokasi;
        $lokasi->fill($input);
        $lokasi->save();
    }
}