<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DompetController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
