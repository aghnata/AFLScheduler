@extends('dashboard')
@section('penjadwalan', 'menu-open')
@section('jadwal_AFLers', 'active')

@section('content')
  <h1>Jadwal {{$penjadwalans->aflee}}</h1>
  <p>{{ $penjadwalans->afler }}</p>
  <p><center>{{ $penjadwalans->aflee }}</center></p>
  <td><center>{{ $penjadwalans->lokasi }}</center></p>

@endsection
