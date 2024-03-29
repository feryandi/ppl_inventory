@extends('layouts.header')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="/task" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Input Lokasi</label>

                <div class="col-sm-6">
                    <input type="text" name="kode" id="task-name" class="form-control">
                </div>
                <div class="col-sm-6">
                    <input type="text" name="nama" id="task-name" class="form-control">
                </div>

                <div class="col-sm-6">
                    <select>
                @foreach ($lokasi as $l)
                    <option value="{{$l->id}}">{{$l->nama}}</option>
                @endforeach
                    </select>
                </div>

            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: Current Tasks -->
@endsection