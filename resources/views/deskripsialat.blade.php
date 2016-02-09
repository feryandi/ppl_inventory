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
        <td>{{($is_available == 0)? "Tidak tersedia" : "Tersedia"}}</td>
      </tr>
      <tr>
        <td>Status Pemeliharaan</td>
        <td>:</td>
        <td>
          {{($is_maintenance == 0)? "Sedang perbaikan" : "Berfungsi"}} |
          <a href="" class="btn btn-primary btn-sm">
            {{($is_maintenance == 0)? "Selesai perbaikan" : "Perbaiki"}}
          </a>
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><a href="{{ url('/alat/edit/' . $alat[0]->id) }}">Edit</a> | <a href="">Hapus</a></td>
      </tr>
    </table>
    
    <div class="aksi-alat">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#pinjamModal">Pinjam</a>
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#bookModal">Book</a>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="pinjamModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Pinjam Alat</h4>
        </div>
        <div class="modal-body"> 
          @include('common.errors')

          <!-- New Task Form -->
          <form action="/alat/transaksi/{{$alat[0]->id}}" method="POST" class="form-horizontal">
              {{ csrf_field() }}

              <div class="form-group">
                  <label for="peminjam" class="col-sm-2 control-label">NIP/NIM Peminjam</label>
                  <div class="col-sm-10">
                      <input type="text" name="nipnim" class="form-control" id="peminjam" placeholder="Peminjam">
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
  <div class="modal fade" id="bookModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Booking Alat</h4>
        </div>
        <div class="modal-body">
          @include('common.errors')

          <!-- New Task Form -->
          <form action="/alat/booking/{{$alat[0]->id}}" method="POST" class="form-horizontal">
              {{ csrf_field() }}
            <div class="form-group">
                <label for="pengguna" class="col-sm-2 control-label">NIP/NIM Pengguna</label>
                <div class="col-sm-10">
                    <input type="text" name="nipnim" class="form-control" id="pengguna" placeholder="pengguna">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Peminjaman</label>
                <div class="col-sm-10 input-date">
                  D <input type="text" name="mulai_d" id="task-name" class="form-control">
                  M <input type="text" name="mulai_m" id="task-name" class="form-control">
                  Y <input type="text" name="mulai_y" id="task-name" class="form-control">
                  H <input type="text" name="mulai_h" id="task-name" class="form-control">
                  i <input type="text" name="mulai_i" id="task-name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Pengembalian</label>
                <div class="col-sm-10 input-date">
                  D <input type="text" name="selesai_d" id="task-name" class="form-control">
                  M <input type="text" name="selesai_m" id="task-name" class="form-control">
                  Y <input type="text" name="selesai_y" id="task-name" class="form-control">
                  H <input type="text" name="selesai_h" id="task-name" class="form-control">
                  i <input type="text" name="selesai_i" id="task-name" class="form-control">
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