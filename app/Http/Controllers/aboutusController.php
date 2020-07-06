<?php

namespace App\Http\Controllers;

use App\Aboutus;
use Illuminate\Http\Request;

class aboutusController extends Controller
{
    public function  index()
    {
        $about_us = Aboutus::all();
        return view('about-us',['about_us' => $about_us]);

    }
}
