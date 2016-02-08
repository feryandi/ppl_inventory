@extends('layouts.header')
@section('content')
  <div class="page-header">
    <h1>Nama Alat</h1>
  </div>
  <div class="alat">
    <table class="deskripsi-alat">
      <tr>
        <td>ID</td>
        <td>:</td>
        <td>1</td>
      </tr>
      <tr>
        <td>Kode Barang</td>
        <td>:</td>
        <td>PR</td>
      </tr>
      <tr>
        <td>Lokasi</td>
        <td>:</td>
        <td>Meja A</td>
      </tr>
      <tr>
        <td>Ketersediaan</td>
        <td>:</td>
        <td>Tersedia</td>
      </tr>
      <tr>
        <td>Status Pemeliharaan</td>
        <td>:</td>
        <td>Berfungsi</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><a href="">Edit</a> | <a href="">Hapus</a></td>
      </tr>
    </table>
    
    <div class="aksi-alat">
      <form>
        <input type="submit" class="btn btn-primary" value="Pinjam">
      </form>
      
      <form>
        <input type="submit" class="btn btn-success" value="Book">
      </form>
    </div>
  </div>
@endsection