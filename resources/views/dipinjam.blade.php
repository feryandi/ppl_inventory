@extends('layouts.header')

@section('content')
    <div class="page-header">
        <h1>Daftar Alat Tersedia</h1>
        <form class="form-inline" method="GET" action="">
            <div class="form-group">
                <label class="sr-only" for="searchInput">Cari barang</label>
                <select name="filter" class="form-control daftar-alat">
                    <option value="">Kategori</option>
                    <option value="Proyektor">Proyektor</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Keyboard">Keyboard</option>
                    <option value="Mouse">Mouse</option>
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
                <th>Peminjam</th>
                <th>Tanggal Meminjam</th>
                <th>Tanggal Mengembalikan</th>
                <th>Operasi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($alat as $a)
                <tr>
                    <td><a href="#">{{$a->id}}</a></td>
                    <td>{{$a->kode}}</td>
                    <td>{{$a->nama}}</td>
                    <td>{{$a->lokasi}}</td>
                    <td>{{$a->mulai}}</td>
                    <td>{{$a->selesai}}</td>
                    <td><a href="#"><button class="btn btn-danger">Edit</button></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
