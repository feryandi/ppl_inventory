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
          {{($is_maintenance == 0)? "Sedang perbaikan" : "Berfungsi" }} |
          @if ($is_maintenance == 0)
            <a href="{{ url('/pemeliharaan/selesai/' . $alat[0]->id) }}" class="btn btn-primary btn-sm">
              Selesai Perbaikan
            </a>
          @else
            <a href="{{ url('/alat/pemeliharaan/' . $alat[0]->id) }}" class="btn btn-primary btn-sm">
              Lakukan Pemeliharaan
            </a>
          @endif
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><a href="{{ url('/alat/edit/' . $alat[0]->id) }}">Edit</a> | <a href="{{ url('/alat/hapus/' . $alat[0]->id) }}">Hapus</a></td>
      </tr>
    </table>
    
    <div class="aksi-alat">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#pinjamModal">Pinjam</a>
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#bookModal">Book</a>
    </div>
  </div>

  <div class="riwayat">
    <div class="page-header">
      <h3>Riwayaat Penggunaan Alat</h2>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>NIP / NIM</th>
              <th>Pengguna</th>
              <th>Tanggal Peminjaman</th>
              <th>Tanggal Pengembalian</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($history_t as $h)
            <tr>
              <td>{{ $h->id }}</td>
              <td>{{ $h->nama }}</td>
              <td>{{ date('d F Y H:i', strtotime($h->dipinjam)) }}</td>
              <td>{{ ($h->dikembalikan == '0000-00-00 00:00:00')?"Belum Dikembalikan":date('d F Y H:i', strtotime($h->dikembalikan))  }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>


  <div class="riwayat">
    <div class="page-header">
      <h3>Riwayaat Perbaikan Alat</h2>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Tanggal Mulai</th>
              <th>Tanggal Selesai</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($history_m as $h)
            <tr>
              <td>{{ date('d F Y H:i', strtotime($h->mulai)) }}</td>
              <td>{{ ($h->selesai == '0000-00-00 00:00:00')?"Belum Selesai":date('d F Y H:i', strtotime($h->selesai))  }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
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
                  <input class="form-control datetimepicker" name="mulai" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Pengembalian</label>
                <div class="col-sm-10 input-date">
                  <input class="form-control datetimepicker" name="selesai" type="text">
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