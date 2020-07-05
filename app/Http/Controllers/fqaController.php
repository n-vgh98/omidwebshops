<?php

namespace App\Http\Controllers;

use App\Fqa;
use Illuminate\Http\Request;

class fqaController extends Controller
{
    //
    public function index()
    {
        $fqa = Fqa::all();
        return view('fqa',['fqa' => $fqa]);
    }
}
