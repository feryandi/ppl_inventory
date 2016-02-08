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
                <input type="text"  name="nama" class="form-control" id="task-name" placeholder="Kode alat">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Tambah Lokasi</button>
            </div>
        </div>
    </form>

    <!-- TODO: Current Tasks -->
@endsection