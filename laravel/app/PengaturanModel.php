<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengaturanModel extends Model
{
    protected $table = 'tb_setting';
    protected $fillable = [
        'id', 
        'tglbuka',	
        'tgltutup',	
        'biaya',
        'namabank',
        'norek',
        'namarekening',	
        'cppesantren',	
        'cpsma',	
        'cpsmp',	
        'statuspendaftaran'
    ];
}
