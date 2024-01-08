<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeCbtController extends Controller
{
    public function index()
    {
        return view('pages.homecbt.index');
    }
}
