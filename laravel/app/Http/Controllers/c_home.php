<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class c_home extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jmlmadin = DB::table('tb_pendaftaran as a')->join('tahun_akademik as b', 'a.id_akademik','=','b.id_akademik')
                    ->where('b.status', '=', '1')
                    ->where('a.status_santri', '=', 'baru')
                    ->where('a.domisili','=','dalbar')
                    ->count();
        $jmlsma = DB::table('tb_pendaftaran as a')->join('tahun_akademik as b', 'a.id_akademik','=','b.id_akademik')
                    ->where('b.status', '=', '1')
                    ->where('a.kategori', '=', '2')
                    ->count();
        $jmlsmp = DB::table('tb_pendaftaran as a')->join('tahun_akademik as b', 'a.id_akademik','=','b.id_akademik')
                    ->where('b.status', '=', '1')
                    ->where('a.kategori', '=', '3')
                    ->count();
        // $grafik = DB::table('v_grafik')->select('*')->first();
        // $jumlah = $grafik->madin + $grafik->smp + $grafik->sma;
        $set = DB::table('tb_setting')->first();
        return view('home', compact('set', 'jmlmadin', 'jmlsma', 'jmlsmp'));
    }
}
