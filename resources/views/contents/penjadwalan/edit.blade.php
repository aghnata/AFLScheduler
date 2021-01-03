@extends('dashboard')
@section('penjadwalan', 'menu-open')
@section('jadwal_AFLers', 'active')

@section('content')
  <center>
    <div class="container">
      <div class="col-md-6">
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">Edit Jadwal</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form class="" action="/jadwal_AFLers/{{$penjadwalans->id}}" method="post">
            <div class="card-body">
              <div class="form-group">
                <labelnggal Mengajar</label><br>
                <input type="date" name="tgl" value="{{$penjadwalans->tgl}}">
                {{ ($errors->has('tgl')) ? $errors->first('tgl') : '' }}
              </div>
              <div class="form-group">
                <label>Nama Pengajar</label><br>
                <input type="text" name="afler" value="{{$penjadwalans->afler}}">
                {{ ($errors->has('afler')) ? $errors->first('afler') : '' }}
              </div>
              <div class="form-group">
                <label>Nama Siswa</label><br>
                <input type="text" name="aflee" value="{{$penjadwalans->aflee}}">
                {{ ($errors->has('aflee')) ? $errors->first('aflee') : '' }}
              </div>
              <div class="form-group">
                <label>Lokasi</label><br>
                <input type="text" name="lokasi" value="{{$penjadwalans->lokasi}}">
                {{ ($errors->has('lokasi')) ? $errors->first('lokasi') : '' }}
              </div>
              <div class="form-group">
                <label>Jumlah Siswa</label><br>
                <input type="text" name="jum_siswa" value="{{$penjadwalans->jum_siswa}}">
                {{ ($errors->has('jum_siswa')) ? $errors->first('jum_siswa') : '' }}
              </div>
              <div class="form-group">
                <label>Jumlah Sesi</label><br>
                <input type="text" name="jum_sesi" value="{{$penjadwalans->jum_sesi}}">
                {{ ($errors->has('jum_sesi')) ? $errors->first('jum_sesi') : '' }}
              </div>
              <div class="form-group">
                <label>Fee Pokok</label><br>
                <input type="text" name="fee_pokok" value="{{$penjadwalans->fee_pokok}}">
                {{ ($errors->has('fee_pokok')) ? $errors->first('fee_pokok') : '' }}
              </div>
              <div class="form-group">
                <label>Ongkos</label><br>
                <input type="text" name="ongkos" value="{{$penjadwalans->ongkos}}">
                {{ ($errors->has('ongkos')) ? $errors->first('ongkos') : '' }}
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <input type="hidden" name="_method" value="put">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" name="name" value="edit" class="btn btn-warning">Edit</button>
              {{-- <input type="submit" name="name" value="edit"> --}}
            </div>
          </form>
        </div>
      </div>
    </div>
  </center>

@endsection
