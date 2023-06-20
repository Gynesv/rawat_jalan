<?php

namespace App\Http\Controllers;

use App\Models\SistemApp;
use Illuminate\Http\Request;
use App\Models\ModRajalJaminan;

class RajalJaminanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     # FUNGSI INDEX

    public function index()
    {
        $app    = SistemApp::sistem();
        return view('rajal_jaminan.index', compact('app'));
    }

    # FUNGSI VIEW (READ)

    public function view()
    {
        $result = array('success' => false);

        try {

            $data = ModRajalJaminan::get();

        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();
            return response()->json($result);
        }

        $result['success'] = true;
        $result['data'] = $data;

        return response()->json($result);
    }
}
