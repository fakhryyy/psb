@extends('index')
@section('css')

<style>
    #second,#third,#fourth{
        display: none;
    }
</style>
@endsection
@section('page')
<main role="main" class="container" style="padding:100px 0 70px 0;">
<a href="{{url('data-santri')}}" class="btn btn-danger mb-1"><i class="fas fa-arrow-left"></i> Kembali</a>
<div class="card border-success">
    <div class="card-body">
        <h3>Form Data Peserta Didik</h3>
        <hr>
        <form action="#" class="needs-validation" novalidate id="form-edit-data"  method="post" enctype="multipart/form-data">
            @csrf
            <div class="progress mb-2" style="height:35px;">
                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" id="progressBar"><div class="lead" id="progressBarText" style="font-size:10pt;font-weight:bold;">Langkah - 1</div></div>
            </div>
            <h5 style="text-decoration: underline;" class="text-center" id="title">IDENTITAS PESERTA DIDIK</h5>
            <div id="first">
                <input type="hidden" name="id_daftar" id="id_daftar" value="<?= $data->id_daftar?>">
                <div class="form-group">
                    <label for="email">Lembaga<span class="text-danger"> *</span></label>
                    <select class="form-control" id="kategori" name="kategori" disabled>
                        <option value="">- Pilih -</option>
                    </select>
                    <div id="kategoriError" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="email">Status Santri<span class="text-danger"> *</span></label>
                    <select class="form-control" id="status" name="status">
                        <option value="">- Pilih -</option>
                        <option value="baru" <?= ((isset($data->status_santri) || $data->status_santri != null) && $data->status_santri == 'baru') ? 'selected' : '' ?>>Santri Baru</option>
                        <option value="lanjut" <?= ((isset($data->status_santri) || $data->status_santri != null) && $data->status_santri == 'lanjut') ? 'selected' : '' ?>>Santri Lanjutan</option>
                    </select>
                    <div id="jkError" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                        <label for="no_urut">Kode Pendaftaran<span class="text-danger"> *</span></label>
                        <input type="text" name="no_urut" id="no_urut" class="form-control" readonly value="<?= isset($data->no_urut) || $data->no_urut != null ? $data->no_urut : '' ?>">
                        <div id="no_urutError" class="invalid-feedback"></div>
                    </div>
                <div class="form-group">
                    <label for="pwd">Nama Lengkap<span class="text-danger"> *</span></label>
                    <input type="text" id="nama" name="nama" class="form-control" value="<?= isset($data->nama) || $data->nama != null  ? $data->nama : '' ?>">
                    <div id="namaError" class="invalid-feedback"></div>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <label for="pwd">NIK<span class="text-danger"> *</span></label>
                        <input type="text" name="nik" id="nik" class="form-control" value="<?= isset($data->nik) || $data->nik != null ? $data->nik : '' ?>">
                        <div id="nikError" class="invalid-feedback"></div>
                    </div>
                    <div class="col-6">
                        <label for="pwd">NISN</label>
                        <input type="text" id="nisn" name="nisn" class="form-control" value="<?= isset($data->nisn) || $data->nisn != null ? $data->nisn : '' ?>">
                        <div id="nisnError" class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <label for="pwd">NO. KK</label>
                        <input type="text" name="no_kk" id="no_kk" class="form-control" value="<?= isset($data->no_kk)  || $data->no_kk != null ? $data->no_kk : '' ?>">
                        <div id="no_kkError" class="invalid-feedback"></div>
                    </div>
                    <div class="col-6">
                        <label for="pwd">No. Akta Kelahiran</label>
                        <input type="text" id="no_akte" name="no_akte" class="form-control" value="<?= isset($data->no_akte) || $data->no_akte != null ? $data->no_akte : '' ?>">
                        <div id="no_akteError" class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pwd">No. KIP<span class="text-danger"> (Bila Ada)</span></label>
                    <input type="text" name="nokip" class="form-control" id="nokip" placeholder="..." value="<?= isset($data->nokip)  || $data->nokip != null ? $data->nokip : '' ?>">
                    <div id="nokipError" class="invalid-feedback"></div>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <label for="pwd">Kota Kelahiran<span class="text-danger"> *</span></label>
                        <input type="text" id="kota_lahir" name="kota_lahir" class="form-control" placeholder="Kota Kelahiran" value="<?= isset($data->kota_lahir) || $data->kota_lahir != null ? $data->kota_lahir : '' ?>">
                        <div id="kotaError" class="invalid-feedback"></div>
                    </div>
                    <div class="col-6">
                        <label for="pwd">Tanggal Lahir<span class="text-danger"> *</span></label>
                        <div class="input-group mb-3">
                            <input type="text" id="tgl_lahir" name="tgl_lahir" class="form-control datepicker" aria-describedby="basic-addon2" value="<?= isset($data->tgl_lahir) || $data->tgl_lahir != null ? $data->tgl_lahir : '' ?>">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <div id="tgl_lahirError" class="invalid-feedback"></div>
                        </div>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Jenis Kelamin<span class="text-danger"> *</span></label>
                    <select class="form-control" id="jk" name="jk">
                        <option value="">- Pilih -</option>
                        <option value="l" <?= ((isset($data->jk) || $data->jk != null) && $data->jk == 'l') ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="p" <?= ((isset($data->jk) || $data->jk != null) && $data->jk == 'p') ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                    <div id="jkError" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="ke">Anak Ke </label>
                    <div class="form-inline">
                        <div class="form-group">
                            <input type="number" name="anak_ke" id="anak_ke" class="form-control  mr-sm-2" value="<?= isset($data->anak_ke) || $data->anak_ke != null ? $data->anak_ke : '' ?>">
                            <label for="jml_saudara">Dari</label>
                            <input type="number" name="jml_saudara" id="jml_saudara" class="form-control mx-sm-2" value="<?= isset($data->jml_saudara) || $data->jml_saudara != null ? $data->jml_saudara : '' ?>">
                            <label >Bersaudara</label>
                            <div id="anakkeError" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pwd">Alamat (Dusun, RT/RW)<span class="text-danger"> *</span></label>
                    <input type="text" name="alamat" class="form-control" id="alamat" value="<?= isset($data->alamat) || $data->alamat != null ? $data->alamat : '' ?>">
                    <div id="alamatError" class="invalid-feedback"></div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="email">Provinsi<span class="text-danger"> *</span></label>
                        <select class="form-control" name="provinsi" id="provinsi">
                            <option value="">- Pilih -</option>
                        </select>
                        <div id="provinsiError"  class="invalid-feedback"></div>
                    </div>
                    <div class="col-md-3">
                        <label for="email">Kabupaten<span class="text-danger"> *</span></label>
                        <input type="hidden" name="lastKabupaten" value="<?= isset($data->kabupaten) || $data->kabupaten != null ? $data->kabupaten : '' ?>">
                        <select class="form-control" name="kabupaten" id="kabupaten" disabled >
                            <?php
                                if (isset($data->kabupaten)  || $data->kabupaten != null) {
                                    echo '<option>'.$data->nama_kabupaten.'</option>';
                                }
                            ?>
                        </select>
                        <div id="kabupatenError" class="invalid-feedback"></div>
                    </div>
                    <div class="col-md-3">
                        <label for="email">Kecamatan<span class="text-danger"> *</span></label>
                        <input type="hidden" name="lastKecamatan" value="<?= isset($data->kecamatan) || $data->kecamatan != null ? $data->kecamatan : '' ?>">
                        <select class="form-control" name="kecamatan" id="kecamatan" disabled>
                            <?php
                                if (isset($data->kecamatan) || $data->kecamatan != null) {
                                    echo '<option>'.$data->nama_kecamatan.'</option>';
                                }
                            ?>
                        </select>
                        <div id="kecamatanError" class="invalid-feedback"></div>
                    </div>
                    <div class="col-md-3">
                        <label for="email">Kelurahan<span class="text-danger"> *</span></label>
                        <input type="hidden" name="lastKelurahan" value="<?= isset($data->kelurahan) || $data->kelurahan != null ? $data->kelurahan : '' ?>">
                        <select class="form-control" name="kelurahan" id="kelurahan" disabled>
                            <?php
                                if (isset($data->kelurahan)  || $data->kelurahan != null) {
                                    echo '<option>'.$data->nama_desa.'</option>';
                                }
                            ?>
                        </select>
                        <div id="kelurahanError" class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pwd">No. HP/Whatsapp<span class="text-danger"> (Pastikan nomor yg anda masukkan sudah benar dan terdaftar pada aplikasi Whatsapp)</span></label>
                    <input type="number" name="nohp" class="form-control" id="nohp" placeholder="082xxxxxxxxx" value="<?= isset($data->nohp) || $data->nohp != null ? $data->nohp : '' ?>">
                    <div id="nohpError" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="email">Domisili<span class="text-danger"> *</span></label>
                    <select class="form-control" id="domisili" name="domisili">
                        <option value="">- Pilih -</option>
                        <option value="dalbar" <?= ((isset($data->domisili) || $data->domisili != null) && $data->domisili == 'dalbar') ? 'selected' : '' ?>>PPBU Mlokorejo</option>
                        <option value="daltim" <?= ((isset($data->domisili) || $data->domisili != null) && $data->domisili == 'daltim') ? 'selected' : '' ?>>PPBU Mlokorejo Daltim</option>
                    </select>
                    <div id="domisiliError" class="invalid-feedback"></div>
                </div>
                <button type="button" class="btn btn-danger float-right" id="next-1"><i class="fas fa-arrow-right"></i> Selanjutnya</button>
            </div>

            <div id="second">
                <div class="form-group">
                    <label for="pwd">Nama Sekolah Asal<span class="text-danger"> *</span></label>
                    <input type="text" name="sekolah_asal" id="sekolah_asal" class="form-control" value="<?= isset($data->sekolah_asal) || $data->sekolah_asal != null ? $data->sekolah_asal : '' ?>">
                    <div id="sekolah_asalError" class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="pwd">Alamat Sekolah Asal<span class="text-danger"> *</span></label>
                    <input type="text" name="alamat_sekolah" id="alamat_sekolah" class="form-control"  value="<?= isset($data->alamat_sekolah_asal) || $data->alamat_sekolah_asal != null ? $data->alamat_sekolah_asal : '' ?>">
                    <div id="alamat_sekolahError" class="invalid-feedback"></div>
                </div>
                <button type="button" class="btn btn-danger" id="prev-2"><i class="fas fa-arrow-left"></i> Sembelumnya</button>
                <button type="button" class="btn btn-danger float-right" id="next-2"><i class="fas fa-arrow-right"></i> Selanjutnya</button>
            </div>

            <div id="third">
                <div class="card mb-2">
                    <h5 class="card-header">Ayah</h5>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="pwd">Nama Ayah<span class="text-danger"> *</span></label>
                            <input type="text" name="ayah" id="ayah" class="form-control"  value="<?= isset($data->ayah) || $data->ayah != null ? $data->ayah : '' ?>">
                            <div id="ayahError" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">NIK Ayah</label>
                            <input type="text" name="nik_ayah" id="nik_ayah" class="form-control" value="<?= isset($data->nik_ayah) || $data->nik_ayah != null ? $data->nik_ayah : '' ?>">
                            <div id="nik_ayahError" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="pwd">Tempat Lahir Ayah</label>
                                <input type="text" id="tempat_lahir_ayah" name="tempat_lahir_ayah" class="form-control" placeholder="Tempat Lahir Ayah" value="<?= isset($t_ayah)  || $t_ayah != '' ? $t_ayah : '' ?>">
                                <div id="tempat_lahir_ayahError" class="invalid-feedback"></div>
                            </div>
                            <div class="col-6">
                                <label for="pwd">Tanggal Lahir Ayah</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="tgl_lahir_ayah" name="tgl_lahir_ayah" class="form-control datepicker" aria-describedby="basic-addon2" value="<?= isset($tl_ayah) || $tl_ayah != '' ? $tl_ayah : '' ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <div id="tgl_lahir_ayahError" class="invalid-feedback"></div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Pendidikan Terakhir Ayah</label>
                            <input type="text" name="pend_ayah" id="pend_ayah" class="form-control" value="<?= isset($data->pend_ayah) || $data->pend_ayah != null ? $data->pend_ayah : '' ?>">
                            <div id="pend_ayahError" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Pekerjaan Ayah</label>
                            <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control" value="<?= isset($data->pekerjaan_ayah) || $data->pekerjaan_ayah != null ? $data->pekerjaan_ayah : '' ?>">
                            <div id="pekerjaan_ayahError" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">No. Telp Ayah</label>
                            <input type="text" name="nohp_ayah" id="nohp_ayah" class="form-control" value="<?= isset($data->nohp_ayah) || $data->nohp_ayah != null ? $data->nohp_ayah : '' ?>">
                            <div id="nohp_ayahError" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Penghasilan Ayah / Bulan</label>
                            <input type="text" name="penghasilan_ayah" id="penghasilan_ayah" class="form-control" value="<?= isset($data->penghasilan_ayah) || $data->penghasilan_ayah != null ? $data->penghasilan_ayah : '' ?>">
                            <div id="penghasilan_ayahError" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <h5 class="card-header">Ibu</h5>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="pwd">Nama Ibu<span class="text-danger"> *</span></label>
                            <input type="text" name="ibu" id="ibu" class="form-control" value="<?= isset($data->ibu) || $data->ibu != null ? $data->ibu : '' ?>">
                            <div id="ibuError" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">NIK Ibu</label>
                            <input type="text" name="nik_ibu" id="nik_ibu" class="form-control" value="<?= isset($data->nik_ibu) || $data->nik_ibu != null ? $data->nik_ibu : '' ?>">
                            <div id="nik_ibuError" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="pwd">Tempat Lahir Ibu</label>
                                <input type="text" id="tempat_lahir_ibu" name="tempat_lahir_ibu" class="form-control" placeholder="Tempat Lahir ibu" value="<?= isset($t_ibu) || $t_ibu != '' ? $t_ibu : '' ?>">
                                <div id="tempat_lahir_ibuError" class="invalid-feedback"></div>
                            </div>
                            <div class="col-6">
                                <label for="pwd">Tanggal Lahir Ibu</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="tgl_lahir_ibu" name="tgl_lahir_ibu" class="form-control datepicker" aria-describedby="basic-addon2" value="<?= isset($tl_ibu) || $tl_ibu != '' ? $tl_ibu : '' ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <div id="tgl_lahir_ibuError" class="invalid-feedback"></div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Pendidikan Terakhir Ibu</label>
                            <input type="text" name="pend_ibu" id="pend_ibu" class="form-control" value="<?= isset($data->pend_ibu) || $data->pend_ibu != null ? $data->pend_ibu : '' ?>">
                            <div id="pend_ibuError" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Pekerjaan Ibu</label>
                            <input type="text" name="p_ibu" id="kerja_ibu" class="form-control" value="<?= isset($data->pekerjaan_ibu) || $data->pekerjaan_ibu != null ? $data->pekerjaan_ibu : '' ?>">
                            <div id="kerja_ibuError" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">No. Telp Ibu</label>
                            <input type="text" name="nohp_ibu" id="nohp_ibu" class="form-control" value="<?= isset($data->nohp_ibu) || $data->nohp_ibu != null ? $data->nohp_ibu : '' ?>">
                            <div id="nohp_ibuError" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Penghasilan Ibu / Bulan</label>
                            <input type="text" name="penghasilan_ibu" id="penghasilan_ibu" class="form-control" value="<?= isset($data->penghasilan_ibu) || $data->penghasilan_ibu != null ? $data->penghasilan_ibu : '' ?>">
                            <div id="penghasilan_ibuError" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-danger" id="prev-3"><i class="fas fa-arrow-left"></i> Sembelumnya</button>
                <button type="button" class="btn btn-danger float-right" id="next-3" ><i class="fas fa-arrow-right"></i> Selanjutnya</button>
            </div>
            <div id="fourth">
                <div class="form-group">
                    <label for="email">Status Verifikasi<span class="text-danger"> *</span></label>
                    <select class="form-control" id="is_verif" name="is_verif">
                        <option value="">- Pilih -</option>
                        <option value="0" <?= ((isset($data->is_verif) || $data->is_verif != null) && $data->is_verif == '0') ? 'selected' : '' ?>>Belum diverifikasi</option>
                        <option value="1" <?= ((isset($data->is_verif) || $data->is_verif != null) && $data->is_verif == '1') ? 'selected' : '' ?>>Terverifikasi</option>
                    </select>
                    <div id="is_verifError" class="invalid-feedback"></div>
                </div>
                <button type="button" class="btn btn-danger" id="prev-4"><i class="fas fa-arrow-left"></i> Sembelumnya</button>
                <button type="submit" class="btn btn-success float-right" id="submit" ><i class="fas fa-paper-plane"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>

</main>
@endsection

@section('js')

<script>

$(document).ready(function(){
        var kat = '<?= isset($data->kategori) ? $data->kategori : ''?>';
        var prov = '<?= isset($data->provinsi) ? $data->provinsi : ''?>';

        //datepicker
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });

        //ajax kategori
        $.ajax({
            type: 'GET',
                url: "{{url('api/kategori')}}",
                cache: false, 
                success: function(msg){
                    var opt = '';
                    $.each(msg, function(key, value){
                        var select = ''
                        if (kat != '') {
                            if (kat == value.id) {
                                select = 'selected'
                            }
                        }
                        opt += '<option value="'+value.id+'"'+ select+'>'+value.nama_kategori+'</option>';
                        
                    });
                    $("#kategori").append(opt);
                }
        });

        //ajax alamat
        $.ajax({
            type: 'GET',
                url: "{{url('api/provinsi')}}",
                cache: false, 
                success: function(msg){
                    var opt = '';
                    $.each(msg, function(key, value){
                        var select = ''
                        if (prov != '') {
                            if (prov == value.id) {
                                select = 'selected'
                            }
                        }
                        opt += '<option class="text-uppercase" value="'+value.id+'" '+ select +'>'+value.nama+'</option>';
                        
                    });
                    $("#provinsi").append(opt);
                }
        });

        $("#provinsi").change(function(){
            var provinsi = $("#provinsi").val();
            $('#kabupaten').removeAttr('disabled');
            $('#kabupaten').empty();
            $('#kecamatan').empty();
            $('#kelurahan').empty();
          	$.ajax({
          		type: 'GET',
              	url: "{{url('api/kabupaten')}}" +'/'+ provinsi,
              	cache: false,
              	success: function(msg){
                    var opt = '';
                    $.each(msg, function(key, value){
                        opt += '<option value="'+value.id+'">'+value.nama+'</option>';
                        // console.log(value.nama)
                    });
                    $("#kabupaten").append('<option value="">- Pilih -</option>');
                    $("#kabupaten").append(opt);
                }
            });
        });

        $("#kabupaten").change(function(){
            var kabupaten = $("#kabupaten").val();
            $('#kecamatan').removeAttr('disabled');
            $('#kecamatan').empty();
          	$.ajax({
          		type: 'GET',
              	url: "{{url('api/kecamatan')}}" +'/'+ kabupaten,
              	cache: false,
              	success: function(msg){
                    var opt = '';
                    $.each(msg, function(key, value){
                        opt += '<option value="'+value.id+'">'+value.nama+'</option>';
                        // console.log(value.nama)
                    });
                    $("#kecamatan").append('<option value="">- Pilih -</option>');
                    $("#kecamatan").append(opt);
                }
            });
        });

        $("#kecamatan").change(function(){
            var kecamatan = $("#kecamatan").val();
            $('#kelurahan').removeAttr('disabled');
            $('#kelurahan').empty();
          	$.ajax({
          		type: 'GET',
              	url: "{{url('api/kelurahan')}}" +'/'+ kecamatan,
              	cache: false,
              	success: function(msg){
                    var opt = '';
                    $.each(msg, function(key, value){
                        opt += '<option value="'+value.id+'">'+value.nama+'</option>';
                        // console.log(value.nama)
                    });
                    $("#kelurahan").append('<option value="">- Pilih -</option>');
                    $("#kelurahan").append(opt);
                }
            });
        });

    $('#next-1').click(function(e){
        e.preventDefault();

        $('#kategori').removeClass('is-invalid');
        $('#nama').removeClass('is-invalid');
        $('#nik').removeClass('is-invalid');
        $('#nisn').removeClass('is-invalid');
        $('#no_kk').removeClass('is-invalid');
        $('#no_akte').removeClass('is-invalid');
        $('#nokip').removeClass('is-invalid');
        $('#kota_lahir').removeClass('is-invalid');
        $('#tgl_lahir').removeClass('is-invalid');
        $('#jk').removeClass('is-invalid');
        $('#anak_ke').removeClass('is-invalid');
        $('#jml_saudara').removeClass('is-invalid');
        $('#alamat').removeClass('is-invalid');
        $('#provinsi').removeClass('is-invalid');
        $('#kabupaten').removeClass('is-invalid');
        $('#kecamatan').removeClass('is-invalid');
        $('#kelurahan').removeClass('is-invalid');
        $('#nohp').removeClass('is-invalid');
        $('#domisili').removeClass('is-invalid');


        if($('#kategori').val() == ''){
            $('#kategori').addClass('is-invalid');
            $('#kategori').focus();
            $('#kategoriError').html('* Wajib memilih salah satu lembaga');
            return false;
        }else if($('#nama').val() == ''){
            $('#nama').addClass('is-invalid');
            $('#nama').focus();
            $('#namaError').html('* Kolom nama harus diisi');
            return false;
        }else if(!isNaN($('#nama').val())){
            $('#nama').addClass('is-invalid');
            $('#nama').focus();
            $('#namaError').html('* Kolom nama harus berupa huruf');
            return false;
        }else if($('#nik').val() == ''){
            $('#nik').addClass('is-invalid');
            $('#nik').focus();
            $('#nikError').html('* Kolom NIK harus diisi');
            return false;
        }else if($('#nik').val().length < 16 || $('#nik').val().length > 16){
            $('#nik').addClass('is-invalid');
            $('#nik').focus();
            $('#nikError').html('* Kolom NIK harus 16 digit');
            return false;
        }else if($('#kota_lahir').val() == ''){
            $('#kota_lahir').addClass('is-invalid');
            $('#kota_lahir').focus();
            $('#kota_lahirError').html('* Kolom Kota Kelahiran harus diisi');
            return false;
        }else if($('#tgl_lahir').val() == ''){
            $('#tgl_lahir').addClass('is-invalid');
            $('#tgl_lahir').focus();
            $('#tgl_lahirError').html('* Kolom Tanggal lahir harus diisi');
            return false;
        }else if($('#jk').val() == ''){
            $('#jk').addClass('is-invalid');
            $('#jk').focus();
            $('#jkError').html('* Wajib memilih salah satu Jenis Kelamin');
            return false;
        }else if($('#alamat').val() == ''){
            $('#alamat').addClass('is-invalid');
            $('#alamat').focus();
            $('#alamatError').html('* Kolom alamat harus diisi');
            return false;
        }else if($('#provinsi').val() == ''){
            $('#provinsi').addClass('is-invalid');
            $('#provinsi').focus();
            $('#provinsiError').html('* Wajib memilih provinsi');
            return false;
        }else if($('#kabupaten').val() == ''){
            $('#kabupaten').addClass('is-invalid');
            $('#kabupaten').focus();
            $('#kabupatenError').html('* Wajib memilih kabupaten');
            return false;
        }else if($('#kecamatan').val() == ''){
            $('#kecamatan').addClass('is-invalid');
            $('#kecamatan').focus();
            $('#kecamatanError').html('* Wajib memilih kecamatan');
            return false;
        }else if($('#kalurahan').val() == ''){
            $('#kalurahan').addClass('is-invalid');
            $('#kalurahan').focus();
            $('#kalurahanError').html('* Wajib memilih kelurahan');
            return false;
        }else if($('#nohp').val() == ''){
            $('#wa').addClass('is-invalid');
            $('#wa').focus();
            $('#waError').html('* Kolom No. HP/WA harus diisi');
            return false;
        }
        else if($('#domisili').val() == ''){
            $('#domisili').addClass('is-invalid');
            $('#domisili').focus();
            $('#domisiliError').html('* Kolom domisili harus diisi');
            return false;
        }
        else{
            $('#second').show();
            $('#first').hide();
            $('#progressBar').css('width','50%');
            $('#progressBarText').html('Langkah - 2');
            $('#title').text('IDENTITAS SEKOLAH ASAL');
        }
    });

    $('#next-2').click(function(e){

        e.preventDefault();

        $('#sekolah_asal').removeClass('is-invalid');
        $('#alamat_sekolah').removeClass('is-invalid');

        if($('#sekolah_asal').val() == ''){
            $('#sekolah_asal').addClass('is-invalid');
            $('#sekolah_asal').focus();
            $('#sekolah_asalError').html('* Kolom Nama Sekolah Asal harus diisi');
            return false;
        }else{
            $('#third').show();
            $('#second').hide();
            $('#progressBar').css('width','75%');
            $('#progressBarText').html('Langkah - 3');
            $('#title').text('IDENTITAS ORANG TUAPESERTA DIDIK');
        }
    });

    $('#next-3').click(function(e){

        e.preventDefault();
        $('#ayah').removeClass('is-invalid');
        $('#nik_ayah').removeClass('is-invalid');
        $('#tempat_lahir_ayah').removeClass('is-invalid');
        $('#tgl_lahir_ayah').removeClass('is-invalid');
        $('#pend_ayah').removeClass('is-invalid');
        $('#pekerjaan_ayah').removeClass('is-invalid');
        $('#nohp_ayah').removeClass('is-invalid');
        $('#penghasilan_ayah').removeClass('is-invalid');
        $('#ibu').removeClass('is-invalid');
        $('#nik_ibu').removeClass('is-invalid');
        $('#tempat_lahir_ibu').removeClass('is-invalid');
        $('#tgl_lahir_ibu').removeClass('is-invalid');
        $('#pend_ibu').removeClass('is-invalid');
        $('#pekerjaan_ibu').removeClass('is-invalid');
        $('#nohp_ibu').removeClass('is-invalid');
        $('#penghasilan_ibu').removeClass('is-invalid');

        if ($('#ayah').val() == '') {
            $('#ayah').addClass('is-invalid');
            $('#ayah').focus();
            $('#ayahError').html('* Kolom nama ayah harus diisi');
            return false;
        }else if($('#ibu').val() == ''){
            $('#ibu').addClass('is-invalid');
            $('#ibu').focus();
            $('#ibuError').html('* Kolom pekerjaan ibu harus diisi');
            return false;
        }else {
            $('#fourth').show();
            $('#third').hide();
            $('#progressBar').css('width','100%');
            $('#progressBarText').html('Langkah - 4');
            $('#title').text('VERIFIKASI DATA');
        }
    });
    
    $('#form-edit-data').on('submit', function(e){
        if(!e.isDefaultPrevented()){

            url = "{{ url('/update-data') }}";
            id = $('#id_daftar').val();
            $.ajax({
                url: url,
                type: "POST",
                //data: $('#modal-form form').serialize(),
                data: new FormData($('#form-edit-data')[0]),
                contentType: false,
                processData: false,
                beforeSend: function(){
                    $('#submit').attr('disabled','disabled');
                }, 
                success: function(data){
                    $('#submit').removeAttr('disabled','disabled');
                    Swal.fire({
                        title: 'Sukses!',
                        text: "Berhasil Menyimpan Data",
                        icon: 'success',
                        confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{url('data-santri')}}";
                            }
                        })
                },
                error: function(xhr,msg){
                console.log(msg + '\n' + xhr.responseText);
                    
                }
            });
            return false;
        }
        
    });

    $('#prev-2').click(function(){
        $('#first').show();
        $('#second').hide();
        $('#progressBar').css('width','25%');
        $('#progressBarText').html('Langkah - 1');
        $('#title').text('IDENTITAS PESERTA DIDIK');
    });

    $('#prev-3').click(function(){
        $('#second').show();
        $('#third').hide();
        $('#progressBar').css('width','50%');
        $('#progressBarText').html('Langkah - 2');
        $('#title').text('IDENTITAS SEKOLAH ASAL');
    });

    $('#prev-4').click(function(){
        $('#third').show();
        $('#fourth').hide();
        $('#progressBar').css('width','75%');
        $('#progressBarText').html('Langkah - 3');
        $('#title').text('IDENTITAS ORANG TUA PESERTA DIDIK');
    });

});

</script>

@endsection