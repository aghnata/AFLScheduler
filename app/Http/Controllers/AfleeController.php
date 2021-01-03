<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aflee;

class AfleeController extends Controller
{
    public function ShowAflerByAflee()
    {
        $aflees = Aflee::all();
        return view ('contents.schedule.testShowAfler', compact('aflees'));
    }


}
