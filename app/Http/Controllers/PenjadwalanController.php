<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjadwalan;


class PenjadwalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $penjadwalans = Penjadwalan::all();
      return view('contents.penjadwalan.JadwalAFLers', compact('penjadwalans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('contents.penjadwalan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'tgl' => 'required',
        'afler' => 'required',
        'aflee' => 'required',
        'lokasi' => 'required',
        'jum_siswa' => 'required',
        'jum_sesi' => 'required',
        'fee_pokok' => 'required',
        'ongkos' => 'required',
      ]);
      //
      $penjadwalans = new Penjadwalan;
      $penjadwalans->tgl = $request->tgl;
      $penjadwalans->afler = $request->afler;
      $penjadwalans->aflee = $request->aflee;
      $penjadwalans->lokasi = $request->lokasi;
      $penjadwalans->jum_siswa = $request->jum_siswa;
      $penjadwalans->jum_sesi = $request->jum_sesi;
      $penjadwalans->fee_pokok = $request->fee_pokok;
      $penjadwalans->ongkos = $request->ongkos;
      $penjadwalans->save();
      // $afl = Afl::create([$request->all()]);
      return redirect('jadwal_AFLers')->with('message', 'Schedule has been upadated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $penjadwalans = Penjadwalan::find($id);
      // $penjadwalans = Penjadwalan::where('afler', $afler)->get();

      if (!$penjadwalans) {
        abort(404);
      }

      return view('contents.penjadwalan.singlepage')->with('penjadwalans', $penjadwalans);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $penjadwalans = Penjadwalan::find($id);

      if (!$penjadwalans) {
        abort(404);
      }

      return view('contents.penjadwalan.edit')->with('penjadwalans', $penjadwalans);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validatedData = $request->validate([
        'tgl' => 'required',
        'afler' => 'required',
        'aflee' => 'required',
        'lokasi' => 'required',
        'jum_siswa' => 'required',
        'jum_sesi' => 'required',
        'fee_pokok' => 'required',
        'ongkos' => 'required',
      ]);
      //
      $penjadwalans = Penjadwalan::find($id);
      $penjadwalans->tgl = $request->tgl;
      $penjadwalans->afler = $request->afler;
      $penjadwalans->aflee = $request->aflee;
      $penjadwalans->lokasi = $request->lokasi;
      $penjadwalans->jum_siswa = $request->jum_siswa;
      $penjadwalans->jum_sesi = $request->jum_sesi;
      $penjadwalans->fee_pokok = $request->fee_pokok;
      $penjadwalans->ongkos = $request->ongkos;
      $penjadwalans->save();
      // $afl = Afl::create([$request->all()]);
      return redirect('jadwal_AFLers')->with('message', 'Schedule has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penjadwalans = Penjadwalan::find($id);
        $penjadwalans->delete();
        return redirect('jadwal_AFLers')->with('message', 'Schedule has been deleted');
    }
}
