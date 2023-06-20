<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RajalLayananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
