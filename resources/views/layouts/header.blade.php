<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Inventaris Dukungan Labtek V</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/jquery-ui.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/jquery-ui-timepicker-addon.css')}}" rel="stylesheet">
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SIDUL V</a>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Alat Tersedia <span class="sr-only">(current)</span></a></li>
            <li class="{{ Request::is('dibooking') ? 'active' : '' }}"><a href="{{ url('dibooking') }}">Alat Dibooking</a></li>
            <li class="{{ Request::is('dipinjam') ? 'active' : '' }}"><a href="{{ url('dipinjam') }}">Alat Dipinjam</a></li>
            <li class="{{ Request::is('dipelihara') ? 'active' : '' }}"><a href="{{ url('dipelihara') }}">Alat Dipelihara</a></li>
            <li class="{{ Request::is('tambah') ? 'active' : '' }}"><a href="{{ url('tambah') }}">Tambah Alat</a></li>
            <li class="{{ Request::is('lokasi') ? 'active' : '' }}"><a href="{{ url('lokasi') }}">Lokasi</a></li>
            <li class="{{ Request::is('statistik') ? 'active' : '' }}"><a href="{{ url('statistik') }}">Statistik</a></li>
          </ul>
        </div>
        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            @yield('content')
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="{{ URL::asset('assets/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ URL::asset('assets/jquery-ui.js') }}"></script>
    <script src="{{ URL::asset('assets/jquery-ui-timepicker-addon.js') }}"></script>
    <script src="{{ URL::asset('assets/js/highcharts.js') }}"></script>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- Main JavaScript -->
    <script src="{{ URL::asset('assets/js/main.js') }}"></script>

    @yield('script')
</html>
