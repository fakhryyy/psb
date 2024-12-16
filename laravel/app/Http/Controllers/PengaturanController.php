<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengaturanModel;
use App\Http\Controllers\Controller;

class PengaturanController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->tglentry = date("Y-m-d h:i:s");
    }

    public function index()
    {

        $data = $this->var();
        $dataP = PengaturanModel::first();
        if (!empty($dataP)) {
            $data['statuspendaftaran'] = $dataP->statuspendaftaran;
            $data['tglbuka'] = $dataP->tglbuka;
            $data['tgltutup'] = $dataP->tgltutup;
            $data['biaya'] = $dataP->biaya;
            $data['namabank'] = $dataP->namabank;
            $data['norek'] = $dataP->norek;
            $data['namarekening'] = $dataP->namarekening;
            $data['cppesantren'] = $dataP->cppesantren;
            $data['cpsmp'] = $dataP->cpsmp;
            $data['cpsma'] = $dataP->cpsma;
        }
        return view('pengaturan', compact('data'));
    }

    public function saveData(Request $request)
    {
        $dataP = PengaturanModel::first();
        $inputs = [
            'statuspendaftaran' => $request->statuspendaftaran,
            'tglbuka' => $request->tglbuka,
            'tgltutup' => $request->tgltutup,
            'biaya' => $request->biaya,
            'namabank' => $request->namabank,
            'norek' => $request->norek,
            'namarekening' => $request->namarekening,
            'cppesantren' => $request->cppesantren,
            'cpsmp' => $request->cpsmp,
            'cpsma' => $request->cpsma
        ];

        if (!empty($dataP)) {
            $dataP->update($inputs);
        } else {
            PengaturanModel::create($inputs);
        }
        return response()->json([
            'success' => true,
            'data' => $dataP
        ]);
    }

    public function var()
    {
        $data = [];
        $data['statuspendaftaran'] = "";
        $data['tglbuka'] = "";
        $data['tgltutup'] = "";
        $data['biaya'] = "";
        $data['namabank'] = "";
        $data['norek'] = "";
        $data['namarekening'] = "";
        $data['cppesantren'] = "";
        $data['cpsmp'] = "";
        $data['cpsma'] = "";

        return $data;
    }
}
