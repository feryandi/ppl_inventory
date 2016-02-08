@extends('layouts.header')

@section('content')
    <div class="page-header">
        <h1>Daftar Alat Dipinjam</h1>
        <form class="form-inline" method="GET" action="/dipinjam">
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
                <th>ID</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Peminjam</th>
                <th>Tanggal Meminjam</th>
                <th>Operasi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($alat as $a)
                <tr>
                    <td><a href="#">{{$a->id}}</a></td>
                    <td>{{$a->kode}}</td>
                    <td>{{$a->nama}}</td>
                    <td>{{$a->peminjam}}</td>
                    <td>{{$a->mulai}}</td>
                    <td><a href="#"><button class="btn btn-danger">Edit</button></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
