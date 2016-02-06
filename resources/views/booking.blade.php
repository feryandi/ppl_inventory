@extends('layouts.header')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="/booking/add" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Input Booking</label>
                <input type="hidden" value="1" name="alat">

                <div class="col-sm-6">
                    <label>NIP/NIM</label>
                    <input type="text" name="nipnim" id="task-name" class="form-control">
                </div>

                <div class="col-sm-6">
                    <label>Mulai</label>
                    <div class="col-sm-4">
                        D <input type="text" name="mulai_d" id="task-name" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        M <input type="text" name="mulai_m" id="task-name" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        Y <input type="text" name="mulai_y" id="task-name" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        H <input type="text" name="mulai_h" id="task-name" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        i <input type="text" name="mulai_i" id="task-name" class="form-control">
                    </div>
                </div>

                <div class="col-sm-6">
                    <label>Selesai</label>
                    <div class="col-sm-4">
                        D <input type="text" name="selesai_d" id="task-name" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        M <input type="text" name="selesai_m" id="task-name" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        Y <input type="text" name="selesai_y" id="task-name" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        H <input type="text" name="selesai_h" id="task-name" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        i <input type="text" name="selesai_i" id="task-name" class="form-control">
                    </div>
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