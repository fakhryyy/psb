<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class api extends Controller
{
    public function provinsi(){
        $provinsi = DB::table('wilayah_provinsi')->select('*')->orderBy('nama','ASC')->get();
        return $provinsi;
    }

    public function kabupaten($id_provinsi){
        $kabupaten = DB::table('wilayah_kabupaten')->select('*')->where('provinsi_id','=',$id_provinsi)->orderBy('nama','ASC')->get();
        return $kabupaten;
    }

    public function kecamatan($id_kabupaten){
        $kecamatan = DB::table('wilayah_kecamatan')->select('*')->where('kabupaten_id','=',$id_kabupaten)->orderBy('nama','ASC')->get();
        return $kecamatan;
    }

    public function kelurahan($id_kecamatan){
        $kelurahan = DB::table('wilayah_desa')->select('*')->where('kecamatan_id','=',$id_kecamatan)->orderBy('nama','ASC')->get();
        return $kelurahan;
    }

    public function kategori(){
        $kategori = DB::table('kategori')->select('*')->orderBy('nama_kategori','ASC')->get();
        return $kategori;
    }
}
