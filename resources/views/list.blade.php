@extends('layouts.header')

@section('content')
<div class="page-header">
  <h1>Daftar Alat Tersedia</h1>
  <form class="form-inline" method="GET" action="/">
    <div class="form-group">
      <label class="sr-only" for="searchInput">Cari barang</label>
      <input type="text" name="filter" class="form-control" id="inputFilter" placeholder="Nama alat">
    </div>
    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
  </form>
</div>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Lokasi</th>
        <th>Operasi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($alat as $a)
      <tr>
        <td>{{$a->kode}}</td>
        <td>{{$a->nama}}</td>
        <td>{{$a->lokasi}}</td>
        <td>
          <a href="{{ url('alat/'.$a->id) }}"><button class="btn btn-primary">Detail</button></a>
          <a href="{{ url('alat/hapus/'.$a->id) }}"><button class="btn btn-danger">Hapus</button></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

