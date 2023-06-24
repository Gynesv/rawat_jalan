<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModRajalLayanan;
use App\Models\SistemApp;;

class RajalLayananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    # FUNGSI INDEX

    public function index()
    {
        $app    = SistemApp::sistem();
        return view('rajal_layanan.index', compact('app'));
    }

    # FUNGSI VIEW (READ)

    public function view()
    {
        $result = array('success' => false);

        try {

            $data = ModRajalLayanan::get();

        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();
            return response()->json($result);
        }

        $result['success'] = true;
        $result['data'] = $data;

        return response()->json($result);
    }
}
