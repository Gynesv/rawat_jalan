<?php

namespace App\Http\Controllers;

use App\Models\SistemApp;
use App\Helpers;
use Illuminate\Http\Request;
use App\Models\ModRajalJaminan;
use DB;

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

    public function save(Request $r){
             
        $transaction = DB::connection('mysql')->transaction(function() use($r){

            $app    = SistemApp::sistem();
            $tmp    = new ModRajalJaminan();

            $tmp->jam_kode              = ModRajalJaminan::autokode();
            $tmp->jam_nama              = $r->nama;
            $tmp->jam_perusahaan        = $r->perusahaan;

            // $tmp->created_kode      = $app['kar_kode'];
            // $tmp->created_nama      = $app['kar_nama_awal'];
            // $tmp->created_ip        = $r->ip();

            // $tmp->updated_kode          = $app['kar_kode'];
            // $tmp->updated_nama          = $app['kar_nama_awal'];
            // $tmp->updated_ip            = $r->ip();

            $tmp->save();

            return true;

        });

        return response()->json($transaction);  
    }

    public function edit(Request $r)
    {
        $result = array('success'=>false);

        $id = $r->get('id');
        $data = ModRajalJaminan::where('jam_id', $id)->first();
        return response()->json($data);
    }

    public function update(Request $r){

        $transaction = DB::connection('mysql')->transaction(function() use($r){
  
              $app    = SistemApp::sistem();
              $id     = $r->get('id');
              $tmp    = ModRajalJaminan::where('jam_id',$id)->first();
              $tmp->jam_nama        = $r->nama;
              $tmp->jam_perusahaan  = $r->perusahaan;
  
            //   $tmp->updated_kode          = $app['kar_kode'];
            //   $tmp->updated_nama          = $app['kar_nama_awal'];
            //   $tmp->updated_ip            = $r->ip();
  
              $tmp->save();
  
              return true;
          });
  
          return response()->json($transaction);   
      }
}
