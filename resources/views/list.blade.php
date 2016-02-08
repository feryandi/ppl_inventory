@extends('layouts.header')

@section('content')
<div class="page-header">
  <h1>Daftar Alat</h1>
  <form class="form-inline">
    <div class="form-group">
      <label class="sr-only" for="searchInput">Cari barang</label>
      <select class="form-control daftar-alat">
        <option value="">Cari alat</option>
        <option value="PR">Proyektor</option>
        <option value="LP">Laptop</option>
        <option value="KB">Keyboard</option>
        <option value="MS">Mouse</option>
      </select>
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
        <th>Ketersediaan</th>
        <th>Lokasi</th>
        <th>Status Pemeliharaan</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><a href="#">1,001</a></td>
        <td>Lorem</td>
        <td>ipsum</td>
        <td>dolor</td>
        <td>dolor</td>
        <td>sit</td>
      </tr>
      <tr>
        <td><a href="#">1,001</a></td>
        <td>amet</td>
        <td>consectetur</td>
        <td>adipiscing</td>
        <td>adipiscing</td>
        <td>elit</td>
      </tr>
      <tr>
        <td><a href="#">1,001</a></td>
        <td>Integer</td>
        <td>nec</td>
        <td>odio</td>
        <td>odio</td>
        <td>Praesent</td>
      </tr>
      <tr>
        <td><a href="#">1,001</a></td>
        <td>libero</td>
        <td>Sed</td>
        <td>odio</td>
        <td>cursus</td>
        <td>ante</td>
      </tr>
      <tr>
        <td><a href="#">1,001</a></td>
        <td>dapibus</td>
        <td>diam</td>
        <td>odio</td>
        <td>Sed</td>
        <td>nisi</td>
      </tr>
      <tr>
        <td><a href="#">1,001</a></td>
        <td>Nulla</td>
        <td>quis</td>
        <td>odio</td>
        <td>sem</td>
        <td>at</td>
      </tr>
      <tr>
        <td><a href="#">1,001</a></td>
        <td>nibh</td>
        <td>elementum</td>
        <td>odio</td>
        <td>imperdiet</td>
        <td>Duis</td>
      </tr>
      <tr>
        <td><a href="#">1,001</a></td>
        <td>sagittis</td>
        <td>ipsum</td>
        <td>odio</td>
        <td>Praesent</td>
        <td>mauris</td>
      </tr>
      <tr>
        <td><a href="#">1,001</a></td>
        <td>Fusce</td>
        <td>nec</td>
        <td>odio</td>
        <td>tellus</td>
        <td>sed</td>
      </tr>
      <tr>
        <td><a href="#">1,001</a></td>
        <td>augue</td>
        <td>semper</td>
        <td>odio</td>
        <td>porta</td>
        <td>Mauris</td>
      </tr>
      <tr>
        <td><a href="#">1,001</a></td>
        <td>massa</td>
        <td>Vestibulum</td>
        <td>odio</td>
        <td>lacinia</td>
        <td>arcu</td>
      </tr>
      <tr>
        <td><a href="#">1,001</a></td>
        <td>eget</td>
        <td>odio</td>
        <td>nulla</td>
        <td>Class</td>
        <td>aptent</td>
      </tr>
      <tr>
        <td><a href="#">1,001</a></td>
        <td>taciti</td>
        <td>odio</td>
        <td>sociosqu</td>
        <td>ad</td>
        <td>litora</td>
      </tr>
      <tr>
        <td><a href="#">1,001</a></td>
        <td>torquent</td>
        <td>odio</td>
        <td>per</td>
        <td>conubia</td>
        <td>nostra</td>
      </tr>
      <tr>
        <td><a href="#">1,001</a></td>
        <td>per</td>
        <td>inceptos</td>
        <td>odio</td>
        <td>himenaeos</td>
        <td>Curabitur</td>
      </tr>
      <tr>
        <td><a href="#">1,001</a></td>
        <td>sodales</td>
        <td>odio</td>
        <td>ligula</td>
        <td>in</td>
        <td>libero</td>
      </tr>
    </tbody>
  </table>
</div>
@endsection

