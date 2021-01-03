<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Afl;

class AflController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $afls = Afl::all();
        // return view('afl.index', ['afls' => $afls]); -- penulisan lama di laravel 5.2
        return view('afl.index',compact('afls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('afl.create');
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
        // 'title' => 'required|unique:afl|max:255',
        'title' => 'required|max:255',
        'subject' => 'required',
      ]);
      //
      $afl = new Afl;
      $afl->title = $request->title;
      $afl->subject = $request->subject;
      $afl->save();
      // $afl = Afl::create([$request->all()]);
      return redirect('afl2')->with('message', 'AFL list was updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $afl = Afl::find($id);

        if (!$afl) {
          abort(404);
        }

        return view('afl.singlepage')->with('afl', $afl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $afl = Afl::find($id);

      if (!$afl) {
        abort(404);
      }

      return view('afl.edit')->with('afl', $afl);
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
        'title' => 'required|max:255',
        'subject' => 'required',
      ]);
      //
      $afl = Afl::find($id);
      $afl->title = $request->title;
      $afl->subject = $request->subject;
      $afl->save();
      // $afl = Afl::create([$request->all()]);
      return redirect('afl2')->with('message', 'AFL list was edited');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $afl = Afl::find($id);
      $afl->delete();
      return redirect('afl2')->with('message', 'AFL list was deleted');
    }
}
