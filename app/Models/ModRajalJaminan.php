<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ModRajalJaminan extends Model
{
    protected $table = 'simrs_ta_jaminan';
    protected $primaryKey = 'jam_id';

    public static function autokode()
    {

        $data = DB::table('simrs_ta_jaminan')
                ->select(DB::raw("MAX(RIGHT(jam_kode,4)) as kd_max"));

        if($data->count() > 0)
        {
            foreach($data->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = "JAM".sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd = "JAM".'0001';
        }

        return ($kd);
    }
}
