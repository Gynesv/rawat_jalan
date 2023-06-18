<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

use Carbon\Carbon;

use config;
use DB;

class SistemApp extends Model
{

    public static function sistem() {

        $app = array();

        $user_nama                          = \Auth::guard()->user()->name;
        $user_nama_pecah                    = explode(" ",$user_nama);
        $user_nama_awal                     = $user_nama_pecah[0];

        $app['user_nama']                   = $user_nama_awal;
        $app['user_nama_lengkap']           = $user_nama ;

        $app['url']                         = config('app.url');
        $app['url_dokumen']                 = config('app.url_dokumen');


        return $app;
    }

}