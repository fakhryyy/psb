<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\m_pendaftaran;
use App\PengaturanModel;
use Barryvdh\DomPDF\Facade\PDF;
use App\Exports\ExportData;
use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class c_pendaftaran extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->tglentry = date("Y-m-d h:i:s");
        $this->setting = PengaturanModel::first();
    }

    public function index()
    {
        $set = $this->setting;
        $now = date('Y-m-d');

        if ($set->statuspendaftaran == "tutup" || $now < $set->tglbuka || $now > $set->tgltutup) {
            return view('tutup', compact('set'));
        } else {
            return view('daftar');
        }
    }

    public function edit($id)
    {
        $t_ayah = '';
        $tl_ayah = '';
        $t_ibu  = '';
        $tl_ibu = '';
        $data = m_pendaftaran::select(DB::raw('*'))
            ->join('alamat_lengkap', 'alamat_lengkap.id_daftar', '=', 'tb_pendaftaran.id_daftar')
            ->join('kategori', 'kategori.id', '=', 'tb_pendaftaran.kategori')
            ->where('tb_pendaftaran.id_daftar', '=', $id)->first();
        if ($data->ttl_ayah != null) {
            $t_ayah = substr($data->ttl_ayah, 0, -12);
            $tl_ayah = substr($data->ttl_ayah, -10);
        }
        if ($data->ttl_ibu != null) {
            $t_ibu = substr($data->ttl_ibu, 0, -12);
            $tl_ibu = substr($data->ttl_ibu, -10);
        }
        return view('edit_pendaftaran', compact('data', 't_ayah', 'tl_ayah', 't_ibu', 'tl_ibu'));
    }

    public function update(Request $req)
    {
        $update = $this->prepareInputArray($req, ['updated_at' => $this->tglentry], true);

        m_pendaftaran::where('id_daftar', $req->id_daftar)->update($update);
        return response()->json([
            'success' => true
        ]);
    }

    public function cekNik($nik)
    {
        $cek = m_pendaftaran::join('tahun_akademik as b', 'tb_pendaftaran.id_akademik', '=', 'b.id_akademik')
            ->where('b.status', '=', '1')
            ->where('nik', $nik)->count();
        if ($cek > 0) {
            return 'y';
        } else {
            return 'n';
        }
    }

    public function KodeOtomatis($kat)
    {
        $tahunakademik = DB::table('tahun_akademik')->select('*')->where('status', '=', 1)->first();
        $kodetahun = substr($tahunakademik->tahun_akademik, 2, 2) . substr($tahunakademik->tahun_akademik, -2, 2);
        $cek = m_pendaftaran::where('kategori', '=', $kat)->where('id_akademik', '=', $tahunakademik->id_akademik)->first();
        if ($cek != null) {
            $kode = m_pendaftaran::where('no_urut', '=', DB::table('tb_pendaftaran')->where('kategori', '=', $kat)->max('no_urut'))->first()->no_urut;
        } else {
            $kode = 'PPBU' . $kodetahun . '0000L' . $kat;
        }
        $kode = (int) substr($kode, 8, 4);
        $kode++;
        $result = 'PPBU' . $kodetahun . sprintf("%04s", $kode) . 'L' . $kat;
        return $result;
    }

    public function simpan(Request $req)
    {
        $tahunakademik = DB::table('tahun_akademik')->select('*')->where('status', '=', 1)->first();

        $no_urut = $this->KodeOtomatis($req->kategori);
        $status = true;

        $ceknik = $this->cekNik($req->nik);
        if ($ceknik == 'y') {
            $status = false;
        } else {
            $input = $this->prepareInputArray($req, ['no_urut' => $no_urut, 'id_akademik' => $tahunakademik->id_akademik], false);
            m_pendaftaran::create($input);
        }

        return response()->json([
            'success' => $status,
            'no_urut' => $no_urut
        ]);
    }

    public function generateBukti(Request $request, $id)
    {
        $pendaftaran = m_pendaftaran::where('no_urut', $id)->first();
        switch ($pendaftaran->kategori) {
            case '1':
                $lembaga = 'Pesantren Non Formal';
                break;
            case '2':
                $lembaga = 'SMA Plus Bustanul Ulum Mlokorejo';
                break;
            case '3':
                $lembaga = 'SMP Plus Bustanul Ulum Mlokorejo';
                break;
            default:
                $lembaga = '';
                break;
        }
        $data = [
            'KODE PENDAFTARAN' => $pendaftaran->no_urut,
            'NAMA SANTRI' => $pendaftaran->nama,
            'ASAL SEKOLAH' => $pendaftaran->sekolah_asal,
            'DITERIMA DI LEMBAGA' => $lembaga,
            'TANGGAL MENDAFTAR' => $pendaftaran->created_at->format('d-m-Y')
        ];
        $pdf = PDF::loadView('pdf.buktidaftar', compact('data'));

        // Cek parameter 'download' dari request
        if ($request->has('download') && $request->download == 'true') {
            // Mengunduh PDF
            return $pdf->download('Bukti-Pendaftaran-' . $pendaftaran->no_urut . '.pdf');
        }

        return $pdf->stream('Bukti-Pendaftaran-' . $pendaftaran->no_urut . '.pdf');
    }

    public function prepareInputArray($req, $options = [], $isEdit = false)
    {
        $tanggal_lahir = sprintf('%04d-%02d-%02d', $req->tahunLahir, $req->bulanLahir, $req->tanggalLahir);
        $ttl_ayah = ($req->tempat_lahir_ayah != '' && $req->tgl_lahir_ayah) ? $req->tempat_lahir_ayah . ', ' . $req->tgl_lahir_ayah : null;
        $ttl_ibu = ($req->tempat_lahir_ibu != '' && $req->tgl_lahir_ibu) ? $req->tempat_lahir_ibu . ', ' . $req->tgl_lahir_ibu : null;

        $kabupaten = $req->kabupaten;
        $kecamatan = $req->kecamatan;
        $kelurahan = $req->kelurahan;
        if ($isEdit == true) {
            $kabupaten = $req->kabupaten == null ? $req->lastKabupaten : $req->kabupaten;
            $kecamatan = $req->kecamatan == null ? $req->lastKecamatan : $req->kecamatan;
            $kelurahan = $req->kelurahan == null ? $req->lastKelurahan : $req->kelurahan;
        }

        $inputArray = [
            'nama' => $req->nama,
            'nik' => $req->nik,
            'nisn' => $req->nisn,
            'kota_lahir' => $req->kota_lahir,
            'tgl_lahir' => $tanggal_lahir,
            'no_kk' => $req->no_kk,
            'no_akte' => $req->no_akte,
            'jk' => $req->jk,
            'anak_ke' => $req->anak_ke,
            'jml_saudara' => $req->jml_saudara,
            'alamat' => $req->alamat,
            'provinsi' => $req->provinsi,
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
            'sekolah_asal' => $req->sekolah_asal,
            'alamat_sekolah_asal' => $req->alamat_sekolah,
            'nohp' => $req->nohp,
            'ayah' => $req->ayah,
            'nik_ayah' => $req->nik_ayah,
            'ttl_ayah' => $ttl_ayah,
            'pend_ayah' => $req->pend_ayah,
            'pekerjaan_ayah' => $req->pekerjaan_ayah,
            'nohp_ayah' => $req->nohp_ayah,
            'penghasilan_ayah' => $req->penghasilan_ayah,
            'ibu' => $req->ibu,
            'nik_ibu' => $req->nik_ibu,
            'ttl_ibu' => $ttl_ibu,
            'pend_ibu' => $req->pend_ibu,
            'pekerjaan_ibu' => $req->pekerjaan_ibu,
            'nohp_ibu' => $req->nohp_ibu,
            'penghasilan_ibu' => $req->penghasilan_ibu,
            'kategori' => $req->kategori,
            'domisili' => $req->domisili,
            'status_santri' => $req->status,
            'khusus' => $req->khusus,
        ];

        // Gabungkan dengan options
        return array_merge($inputArray, $options);
    }

    public function data_santri()
    {
        return view('data_santri');
    }

    public function excel($kat)
    {
        return Excel::download(new ExportData($kat), 'data-ppdb.xlsx');
    }

    public function apiDatasantri($id, $status)
    {
        $where = [];
        $kat = '';
        if (Auth::user()->role == 'sma') {
            $kat = 2;
            $where = ['kategori' => $kat];
        } else if (Auth::user()->role == 'smp') {
            $kat = 3;
            $where = ['kategori' => $kat];
        } else {
            if ($id != 'all') {
                if ($id == 1) {
                    $where = ['domisili' => 'dalbar'];
                } else {
                    $where = ['kategori' => $id];
                }
            }
        }

        $data = m_pendaftaran::select(DB::raw('*', 'tahun_akademik.status as status'))
            ->join('alamat_lengkap', 'alamat_lengkap.id_daftar', '=', 'tb_pendaftaran.id_daftar')
            ->join('tahun_akademik', 'tahun_akademik.id_akademik', '=', 'tb_pendaftaran.id_akademik')
            ->where('tahun_akademik.status', '=', 1);

        if ($status != 'all') {
            $data->where('is_verif', '=', $status);
        }
        if ($where != []) {
            $data->where($where);
        }

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('nama', function ($data) {
                return '<b>' . $data->nama . '</b>';
            })
            ->addColumn('ttl', function ($data) {
                return $data->kota_lahir . ', ' . $data->tgl_lahir;
            })
            ->addColumn('jk', function ($data) {
                if ($data->jk == 'l') {
                    return 'Laki - laki';
                } else {
                    return 'Perempuan';
                }
            })
            ->addColumn('lembaga', function ($data) {
                if ($data->kategori == '2' && $data->domisili == 'dalbar') {
                    return '<h6><span class="badge badge-secondary">Madin</span> <span class="badge badge-primary">SMA</span></h6>';
                } else if ($data->kategori == '3' && $data->domisili == 'dalbar') {
                    return '<h6><span class="badge badge-secondary">Madin</span> <span class="badge badge-warning">SMP</span></h6>';
                } else {
                    if ($data->kategori == '2') {
                        return '<h6><span class="badge badge-primary">SMA</span></h6>';
                    } else if ($data->kategori == '3') {
                        return '<h6><span class="badge badge-warning">SMP</span></h6>';
                    }
                }
            })

            ->addColumn('tgl_daftar', function ($data) {
                $tgl_daftar = substr($data->created_at, 0, 10);
                $jam_daftar = substr($data->created_at, 11, 8);
                return 'Tanggal ' . $tgl_daftar . '<br>Jam ' . $jam_daftar;
            })
            ->addColumn('santri', function ($data) {
                if ($data->status_santri == 'baru') {
                    return '<h6><span class="badge badge-info">Santri Baru</span></h6>';
                } else if ($data->status_santri == 'lanjut') {
                    return '<h6><span class="badge badge-dark">Santri Lanjutan</span></h6>';
                }
            })
            ->addColumn('is_verif', function ($data) {
                if ($data->is_verif == 0) {
                    return '<h6><span class="badge badge-pill badge-danger">Belum Terverifikasi</span></h6>';
                } else {
                    return '<h6><span class="badge badge-pill badge-success">Terverifikasi</span></h6>';
                }
            })
            ->addColumn('action', function ($data) {
                $btn = '<a href="' . url('edit-data/' . $data->id_daftar) . '" class="btn btn-primary btn-sm" title="Edit Data"><i class="fas fa-pencil-alt"></i></a>';
                return $btn;
            })
            ->rawColumns(['action', 'nama', 'ttl', 'jk', 'lembaga', 'tgl_daftar', 'santri', 'is_verif'])
            ->make(true);
    }
}
