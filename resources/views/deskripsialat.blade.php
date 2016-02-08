@extends('layouts.header')
@section('content')
  <div class="page-header">
    <h1>{{$alat[0]->nama}}</h1>
  </div>
  <div class="alat">
    <table class="deskripsi-alat">
      <tr>
        <td>ID</td>
        <td>:</td>
        <td>{{$alat[0]->id}}</td>
      </tr>
      <tr>
        <td>Kode Barang</td>
        <td>:</td>
        <td>{{$alat[0]->kode}}</td>
      </tr>
      <tr>
        <td>Lokasi</td>
        <td>:</td>
        <td>{{$alat[0]->lokasi}}</td>
      </tr>
      <tr>
        <td>Ketersediaan</td>
        <td>:</td>
        <td>{{($is_available == 0)? "Tidak" : "Ya"}}</td>
      </tr>
      <tr>
        <td>Status Pemeliharaan</td>
        <td>:</td>
        <td>{{($is_maintenance == 0)? "Ya" : "Tidak"}}</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><a href="">Edit</a> | <a href="">Hapus</a></td>
      </tr>
    </table>
    
    <div class="aksi-alat">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#pinjamModal">Pinjam</a>
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#bookModal">Book</a>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="pinjamModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Pinjam Alat</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal">
            <div class="form-group">
                <label for="peminjam" class="col-sm-2 control-label">Peminjam</label>
                <div class="col-sm-10">
                    <input type="text"  name="kode" class="form-control" id="peminjam" placeholder="Peminjam">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Pinjam</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Booking Alat</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal">
            <div class="form-group">
                <label for="pengguna" class="col-sm-2 control-label">Pengguna</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pengguna" placeholder="pengguna">
                </div>
            </div>
            <div class="form-group">
                <label for="pinjam" class="col-sm-2 control-label">Tanggal Peminjaman</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="pinjam" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="pengembalian" class="col-sm-2 control-label">Tanggal Pengembalian</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="pengembalian" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Book</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection