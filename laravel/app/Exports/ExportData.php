<?php

namespace App\Exports;

use App\m_pendaftaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use DB;
use Auth;

class ExportData implements FromCollection, WithColumnFormatting, WithMapping, WithHeadings, ShouldAutoSize, WithEvents
{
    protected $kategori;

    function __construct($kat) {
        $this->kategori = $kat;
    }
    
    public function collection()
    {
        $where = [];
        if (Auth::user()->role == 'sma') {
            $where = ['kategori' => '2'];
        }else if (Auth::user()->role == 'smp') {
           $where = ['kategori' => '3'];
        }else{
            if($this->kategori == 1){
                $where = ['domisili' => 'dalbar', 'status_santri' => 'baru'];
            }else if($this->kategori == 2){
                $where = ['kategori' => '2'];
            }else if($this->kategori == 3){
                 $where = ['kategori' => '3'];
            }
        }
        $data = m_pendaftaran::select(DB::raw('*', 'tahun_akademik.status as status'))
        ->join('alamat_lengkap','alamat_lengkap.id_daftar','=','tb_pendaftaran.id_daftar')
        ->join('tahun_akademik', 'tahun_akademik.id_akademik', '=', 'tb_pendaftaran.id_akademik')
        ->where('status','=',1);
        if ($where != []) {
            $data->where($where);
        }
        return $data->get();
    }

    public function columnFormats(): array
    {
        return [
            'B' => '@',
            'E' => 'dd-mm-yyyy',
        ];
    }
    
    public function YmdTodmY($date){
        $bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
            ];
            
        if ($date && preg_match('/\d{4}-\d{2}-\d{2}/', $date)) {
            $dateArray = explode('-', $date);
            $newDate = '';
            if($dateArray[0] != '0000'){
                $newDate = $dateArray[2] . ' ' . $bulan[$dateArray[1]] . ' ' . $dateArray[0];
            }
            return $newDate;
        } else {
            return false; // Mengembalikan false jika format tidak sesuai
        }
    }

    public function map($example): array
    {
        $kat = '';
        if ($example->kategori == '2') {
            $kat = 'SMA';
        }elseif ($example->kategori == '3') {
            $kat = 'SMP';
        }
        $lengthnik = strlen($example->nik) + 1;
        $lengthnisn = strlen($example->nisn) + 1;
        $lengthnokk = strlen($example->no_kk) + 1;
        return [
            'No. Pendaftaran' => $example->no_urut,
            'NIK' => str_pad($example->nik, $lengthnik, "'", STR_PAD_LEFT),
            'NISN' => $example->nisn != null ? str_pad($example->nisn, $lengthnisn, "'", STR_PAD_LEFT) : '',
            'Nama' => $example->nama,
            'Tempat Lahir' => $example->kota_lahir,
            'Tanggal Lahir' => $this->YmdTodmY($example->tgl_lahir),
            'Jenis Kelamin' => $example->jk == 'l' ? 'Laki-laki' : 'Perempuan',
            'Agama' => 'Islam',
            'Ayah' => $example->ayah,
            'NIK Ayah' => $example->nik_ayah != null ? str_pad($example->nik_ayah, $lengthnik, "'", STR_PAD_LEFT) : '',
            'TTL Ayah' => $example->ttl_ayah,
            'Pendidikan Ayah' => $example->pend_ayah,
            'Pekerjaan Ayah' => $example->pekerjaan_ayah,
            'No. HP Ayah' => $example->nohp_ayah,
            'Penghasilan Ayah' => $example->penghasilan_ayah,
            'Ibu' => $example->ibu,
            'NIK Ibu' => $example->nik_ibu != null ? str_pad($example->nik_ibu, $lengthnik, "'", STR_PAD_LEFT) : '',
            'TTL Ibu' => $example->ttl_ibu,
            'Pendidikan Ibu' => $example->pend_ibu,
            'Pekerjaan Ibu' => $example->pekerjaan_ibu,
            'No. HP Ibu' => $example->nohp_ibu,
            'Penghasilan Ibu' => $example->penghasilan_ibu,
            'Sekolah Asal' =>$example->sekolah_asal,
            'Alamat Sekolah Asal' => $example->alamat_sekolah_asal,
            'Alamat' => $example->alamat,
            'Provinsi' => $example->nama_provinsi,
            'Kabupaten' => $example->nama_kabupaten,
            'Kecamatan' => $example->nama_kecamatan,
            'Desa' => $example->nama_desa,
            'Anak Ke' => $example->anak_ke,
            'Jumlah Saudara' => $example->jml_saudara,
            'No. KK' => $example->no_kk != null ? str_pad($example->no_kk, $lengthnokk, "'", STR_PAD_LEFT) : '',
            'No. Akte' => $example->no_akte,
            'Lembaga' => $kat,
            'Domisili' => $example->domisili,
            'Status' => $example->status_santri,
            'No. HP' => $example->nohp,
            // other columns
        ];
    }

    public function headings(): array
    {
        return [
            'No. Pendaftaran',
            'NIK',
            'NISN',
            'Nama',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Agama',
            'Ayah',
            'NIK Ayah',
            'TTL Ayah',
            'Pendidikan Ayah',
            'Pekerjaan Ayah',
            'No. HP Ayah',
            'Penghasilan Ayah',
            'Ibu',
            'NIK Ibu',
            'TTL Ibu',
            'Pendidikan Ibu',
            'Pekerjaan Ibu',
            'No. HP Ibu',
            'Penghasilan Ibu',
            'Sekolah Asal',
            'Alamat Sekolah Asal',
            'Alamat',
            'Provinsi',
            'Kabupaten',
            'Kecamatan',
            'Desa',
            'Anak Ke',
            'Jumlah Saudara',
            'No. KK',
            'No. Akte',
            'Lembaga',
            'Domisili',
            'Status',
            'No. HP',
        ];
    }

    public function registerEvents(): array
    {
        return [
            // Handle by a closure.
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getStyle('A1:ZZ1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ],
                    'alignment' => [
                        'horizontal' => 'center',
                    ],
                ]);
            },
         
        ];
    }
}
