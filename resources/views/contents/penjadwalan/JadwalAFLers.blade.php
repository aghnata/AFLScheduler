@extends('dashboard')
@section('penjadwalan', 'menu-open')
@section('jadwal_AFLers', 'active')

@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Jadwal AFLers</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Penjadwalan</a></li>
            <li class="breadcrumb-item active">Jadwal AFLers</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <div class="card">
    <div class="card-header">
      <a href="/jadwal_AFLers/create"><button type="button" name="button" class="btn btn-primary">Buat Jadwal</button></a>

      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

          <div class="input-group-append">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      <table class="table table-hover">
        <tbody>
            <tr>
              <th><center>No</center></th>
              <th><center>Tanggal</center></th>
              <th><center>AFLer</center></th>
              <th><center>AFLee</center></th>
              <th><center>Lokasi</center></th>
              <th><center>Jumlah Siswa</center></th>
              <th><center>Fee Persesi</center></th>
              <th><center>Jumlah Sesi</center></th>
              <th><center>Fee Total</center></th>
              <th><center>Ongkos</center></th>
              <th><center>Total Salary</center></th>
              <th><center>Action</center></th>
            </tr>
          @foreach ($penjadwalans as $penjadwalan)
            <tr>
              <td><center>{{ $penjadwalan->id }}</center></td>
              <td><center>{{ $penjadwalan->tgl }}</center></td>
              <td><center><a href="/jadwal_AFLers/{{$penjadwalan->id}}">{{ $penjadwalan->afler }}</a></center></td>
              <td><center>{{ $penjadwalan->aflee }}</center></td>
              <td><center>{{ $penjadwalan->lokasi }}</center></td>
              <td><center>{{ $penjadwalan->jum_siswa }}</center></td>
              <td><center>{{ $penjadwalan->fee_pokok + ($penjadwalan->jum_siswa-1)*10000 }}</center></td>
              <td><center>{{ $penjadwalan->jum_sesi }}</center></td>
              <td><center>{{ $penjadwalan->jum_sesi*($penjadwalan->fee_pokok+(($penjadwalan->jum_siswa-1)*10000)) }}</center></td>
              <td><center>{{ $penjadwalan->ongkos }}</center></td>
              <td><center>{{ $penjadwalan->jum_sesi*($penjadwalan->fee_pokok+(($penjadwalan->jum_siswa-1)*10000)) + $penjadwalan->ongkos}}</center></td>
              <td>
                <a href="/jadwal_AFLers/{{$penjadwalan->id}}/edit"> <button class="btn btn-warning" name="button">Edit</button></a>
                <form class="" action="/jadwal_AFLers/{{$penjadwalan->id}}" method="post">
                  <input type="hidden" name="_method" value="delete">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  {{-- <input type="submit" name="name" value="delete"> --}}
                  <button type="submit" name="name" value="delete" class="btn btn-danger">Delete</button>

                </form>
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

@endsection
