@extends('layouts.header')

@section('content')

    <div class="page-header">
        <h1>Tambah Alat</h1>
    </div>
    
    <!-- Display Validation Errors -->
    @include('common.errors')
    <form class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="inputKodeAlat" class="col-sm-2 control-label">Kode</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputKodeAlat" placeholder="Kode alat">
            </div>
        </div>
        <div class="form-group">
            <label for="inputNamaAlat" class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputNamaAlat" placeholder="Nama alat">
            </div>
        </div>
        <div class="form-group">
            <label for="inputLokasiAlat" class="col-sm-2 control-label">Lokasi</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputLokasiAlat" placeholder="Lokasi alat">
            </div>
        </div>
        <div class="form-group">
            <label for="inputKetersediaanAlat" class="col-sm-2 control-label">Ketersediaan</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputKetersediaanAlat" placeholder="Ketersediaan alat">
            </div>
        </div>
        <div class="form-group">
            <label for="inputStatusPemeliharaanAlat" class="col-sm-2 control-label">Status Pemeliharaan</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputStatusPemeliharaanAlat" placeholder="Status pemeliharaan alat">
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