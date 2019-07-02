<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutiara_helper {

    // Tanggal Indonesia Berdasarkan Fungsi time() - 2019-12-13
    function tgl_indo($tanggal){
        $tgl = substr($tanggal, 8, 2);
        $bln = substr($tanggal, 5, 2);
        $thn = substr($tanggal, 0, 4);

        if($bln=='01'){
            $bulan='Januari';
        } else if($bln=='02'){
            $bulan='Februari';
        } else if($bln=='03'){
            $bulan='Maret';
        } else if($bln=='04'){
            $bulan='April';
        } else if($bln=='05'){
            $bulan='Mei';
        } else if($bln=='06'){
            $bulan='Juni';
        } else if($bln=='07'){
            $bulan='Juli';
        } else if($bln=='08'){
            $bulan='Agustus';
        } else if($bln=='09'){
            $bulan='September';
        } else if($bln=='10'){
            $bulan='Oktober';
        } else if($bln=='11'){
            $bulan='November';
        } else if($bln=='12'){
            $bulan='Desember';
        }

        return $tgl.' '.$bulan.' '.$thn;
    }


}