<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Afler;

class AflerController extends Controller
{
    public function ShowAfleeByAfler()
    {
        $aflers = Afler::all();
        return view ('contents.schedule.testShowAflee', compact('aflers'));
    }
}
