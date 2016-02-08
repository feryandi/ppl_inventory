@extends('layouts.header')

@section('content')

    <div class="page-header">
        <h1>Tambah Alat</h1>
    </div>
    
    <!-- Display Validation Errors -->
    @include('common.errors')
    <form action="/task" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="inputKodeAlat" class="col-sm-2 control-label">Kode</label>
            <div class="col-sm-10">
                <input type="text"  name="kode" class="form-control" id="inputKodeAlat" placeholder="Kode alat">
            </div>
        </div>
        <div class="form-group">
            <label for="inputNamaAlat" class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-10">
                <input type="text"  name="nama" class="form-control" id="inputNamaAlat" placeholder="Nama alat">
            </div>
        </div>
        <div class="form-group">
            <label for="inputLokasiAlat" class="col-sm-2 control-label">Lokasi</label>
            <div class="col-sm-10">
                <select class="form-control" name="lokasi">
                @foreach ($lokasi as $l)
                    <option name="lokasi" value="{{$l->id}}">{{$l->nama}}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Tambah</button>
            </div>
        </div>
    </form>
    <!-- TODO: Current Tasks -->
@endsection