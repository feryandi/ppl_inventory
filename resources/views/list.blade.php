@extends('layouts.header')

@section('content')
<div class="page-header">
  <h1>Daftar Alat</h1>
  <form class="form-inline">
    <div class="form-group">
      <label class="sr-only" for="searchInput">Cari barang</label>
      <select class="form-control daftar-alat">
        <option value="">Cari alat</option>
        <option value="PR">Proyektor</option>
        <option value="LP">Laptop</option>
        <option value="KB">Keyboard</option>
        <option value="MS">Mouse</option>
      </select>
    </div>
    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
  </form>
</div>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Ketersediaan</th>
        <th>Lokasi</th>
        <th>Status Pemeliharaan</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($alat as $a)
      <tr>
        <td><a href="#">{{$a->id}}</a></td>
        <td>{{$a->kode}}</td>
        <td>{{$a->nama}}</td>
        <td>Tersedia</td>
        <td>{{$a->lokasi}}</td>
        <td></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

