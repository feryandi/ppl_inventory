@extends('layouts.header')

@section('content')
<div class="page-header">
  <h1>Edit Alat</h1>
</div>

<form class="form-horizontal">
  <div class="form-group">
    <label for="inputKodeAlat" class="col-sm-2 control-label">Kode</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputKodeAlat" placeholder="Kode alat">
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
      <button type="submit" class="btn btn-default">Edit</button>
    </div>
  </div>
</form>
@endsection