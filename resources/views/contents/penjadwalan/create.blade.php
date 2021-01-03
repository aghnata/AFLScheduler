@extends('dashboard')
@section('penjadwalan', 'menu-open')
@section('jadwal_AFLers', 'active')

@section('content')
  <center>
    <div class="container">
      <div class="col-md-6">
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">Buat Jadwal</h3>
          </div>
          <!-- /.card-header -->
          
          <!-- form start -->
          <form class="" action="/jadwal_AFLers" method="post">
            <div class="card-body">
              <div class="form-group">
                <label>Tanggal Mengajar</label><br>
                <input type="date" name="tgl" value="" placeholder="Tanggal">
                {{ ($errors->has('tgl')) ? $errors->first('tgl') : '' }}
              </div>
              <div class="form-group">
                <label>Nama Pengajar</label><br>
                <input type="text" name="afler" value="" placeholder="Pengajar">
                {{ ($errors->has('afler')) ? $errors->first('afler') : '' }}
              </div>
              <div class="form-group">
                <label>Nama Siswa</label><br>
                <input type="text" name="aflee" value="" placeholder="Siswa">
                {{ ($errors->has('aflee')) ? $errors->first('aflee') : '' }}
              </div>
              <div class="form-group">
                <label>Lokasi</label><br>
                <input type="text" name="lokasi" value="" placeholder="Lokasi">
                {{ ($errors->has('lokasi')) ? $errors->first('lokasi') : '' }}
              </div>
              <div class="form-group">
                <label>Jumlah Siswa</label><br>
                <input type="text" name="jum_siswa" value="" placeholder="Jumlah Siswa">
                {{ ($errors->has('jum_siswa')) ? $errors->first('jum_siswa') : '' }}
              </div>
              <div class="form-group">
                <label>Jumlah Sesi</label><br>
                <input type="text" name="jum_sesi" value="" placeholder="Jumlah Sesi">
                {{ ($errors->has('jum_sesi')) ? $errors->first('jum_sesi') : '' }}
              </div>
              <div class="form-group">
                <label>Fee Pokok</label><br>
                <input type="text" name="fee_pokok" value="" placeholder="Fee Pokok">
                {{ ($errors->has('fee_pokok')) ? $errors->first('fee_pokok') : '' }}
              </div>
              <div class="form-group">
                <label>Ongkos</label><br>
                <input type="text" name="ongkos" value="" placeholder="Ongkos">
                {{ ($errors->has('ongkos')) ? $errors->first('ongkos') : '' }}
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" name="name" value="post" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </center>

@endsection
