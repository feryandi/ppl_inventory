@extends('layouts.header')

@section('content')

    <div class="page-header">
        <h1>Hapus Lokasi</h1>
    </div>
    
    <!-- Display Validation Errors -->
    @include('common.errors')
    <form action="{{ url('lokasi/hapus/' . $id) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }} 
        <div class="form-group">
                Jika anda ingin menghapus suatu lokasi, maka anda harus memindahkan seluruh barang dari lokasi tersebut ke lokasi lain.
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-2 control-label">Pindah Barang Ke</label>
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="col-sm-10">
                <select class="form-control" name="lokasi">
                @foreach ($lokasi as $l)
                    <option name="lokasi" value="{{$l->id}}">{{$l->nama}}</option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Hapus Lokasi</button>
            </div>
        </div>
    </form>

    <!-- TODO: Current Tasks -->
@endsection