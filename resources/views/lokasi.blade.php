@extends('layouts.header')

@section('content')

    <div class="page-header">
        <h1>Tambah Lokasi</h1>
    </div>
    
    <!-- Display Validation Errors -->
    @include('common.errors')
    <form action="lokasi/add" method="POST" class="form-horizontal">
        {{ csrf_field() }} 
        <div class="form-group">
            <label for="task-name" class="col-sm-2 control-label">Input Lokasi</label>
            <div class="col-sm-10">
                <input type="text"  name="nama" class="form-control" id="task-name" placeholder="Nama Lokasi">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Tambah Lokasi</button>
            </div>
        </div>
    </form>

    <div class="page-header">
        <h1>Daftar Lokasi</h1>
    </div>
    
    <!-- Display Validation Errors -->
    @include('common.errors')
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Lokasi</th>
              <th>Jumlah Barang</th>
              <th>Operasi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($lokasi as $l)
            <tr>
                <form action="lokasi/edit/{{ $l->id }}" method="POST" class="form-horizontal">
                {{ csrf_field() }} 
                    <td>
                        <span id="text-{{ $l->id }}">{{ $l->nama }}</span>
                        <input id="input-{{ $l->id }}" name="nama" class="form-control" type="text" value="{{ $l->nama }}" style="display:none"/>
                    </td>
                    <td>{{ $l->count }}</td>
                    <td>
                        <a id="edit-{{ $l->id }}" href="#" class="btn btn-warning" onclick="showEdit({{ $l->id }})">Edit</a>
                        <button type="submit" id="submit-{{ $l->id }}" href="#" class="btn btn-warning" onclick="hideEdit({{ $l->id }})" style="display:none">Submit Edit</button>
                        <a class="btn btn-danger" href="{{ url('lokasi/hapus/' . $l->id) }}">Hapus</a>
                    </td>
                </form>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    <script type="text/javascript">
        function showEdit(id) {
            $("#input-" + id).show();
            $("#text-" + id).hide();
            $("#edit-" + id).hide();
            $("#submit-" + id).show();
        }
        function hideEdit(id) {
            $("#input-" + id).hide();
            $("#text-" + id).show();
            $("#edit-" + id).show();
            $("#submit-" + id).hide();
        }
    </script>
    <!-- TODO: Current Tasks -->
@endsection