<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_pendaftaran extends Model
{
    protected $table = 'tb_pendaftaran';
    protected $primaryKey = 'id_daftar';
    protected $fillable = [
        'id_daftar',
        'no_urut',
        'nama',
        'nik',
        'no_kk',
        'nisn',
        'no_akte',
        'kota_lahir',
        'tgl_lahir',
        'jk',
        'alamat',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'agama',
        'sekolah_asal',
        'alamat_sekolah_asal',
        'jml_saudara',
        'anak_ke',
        'ayah',
        'nik_ayah',
        'ttl_ayah',
        'pend_ayah',
        'pekerjaan_ayah',
        'nohp_ayah',
        'penghasilan_ayah',
        'ibu',
        'nik_ibu',
        'ttl_ibu',
        'pend_ibu',
        'pekerjaan_ibu',
        'nohp_ibu',
        'penghasilan_ibu',
        'nohp',
        'id_akademik',
        'id_ekskul',
        'domisili',
        'is_verif',
        'kategori',
        'status_santri',
        'created_at',
        'updated_at',
        'khusus'
    ];
}
