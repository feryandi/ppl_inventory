@extends('layouts.header')


@section('content')

	<ul class="nav nav-tabs">
	  <li role="presentation"><a href="{{ url('statistik') }}">Statistik Alat</a></li>
	  <li role="presentation"><a href="{{ url('statistik/kerusakan') }}">Statistik Kerusakan</a></li>
	  <li role="presentation" class="active"><a href="{{ url('statistik/user/select') }}">Statistik Pengguna</a></li>
	</ul>

	<div class="page-header">
	    <h1>Statistik per Pengguna</h1>
	</div>

	Statistik penggunaan oleh pengguna
	<br/>
	<br/>
    <!-- Display Validation Errors -->
    @include('common.errors')
    <form action="{{ url('statistik/user/redirect/') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }} 
        <div class="form-group">
            <label for="task-name" class="col-sm-2 control-label">NIP / NIM Pengguna</label>
            <div class="col-sm-10">
                <input type="text"  name="nim/nip" class="form-control" id="task-name" placeholder="NIP / NIM">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Cek Statistik</button>
            </div>
        </div>
    </form>


@endsection
