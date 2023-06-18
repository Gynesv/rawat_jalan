<?php

    use Carbon\Carbon;

    function format_tanggal($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tanggal = $pecah[2];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.'-'.$bulan.'-'.$tahun;
    }

    function bulan($bln)
    {
        switch ($bln)
        {
            case 1:
                return "01";
                break;
            case 2:
                return "02";
                break;
            case 3:
                return "03";
                break;
            case 4:
                return "04";
                break;
            case 5:
                return "05";
                break;
            case 6:
                return "06";
                break;
            case 7:
                return "07";
                break;
            case 8:
                return "08";
                break;
            case 9:
                return "09";
                break;
            case 10:
                return "10";
                break;
            case 11:
                return "11";
                break;
            case 12:
                return "12";
                break;
        }
    }

    function format_jekel($jekel)
    {
        switch ($jekel)
        {
            case 'L':
                return "Laki-Laki";
                break;
            case 'P':
                return "Perempuan";
                break;
        }
    }

    function format_rupiah($angka)
    {
        $hasil_rupiah = number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }
?>