@extends('index')
@section('css')

<style>
    #second,
    #third,
    #fourth {
        display: none;
    }

    /* Ukuran radio button lebih besar */
    .large-radio {
        width: 20px;
        height: 20px;
    }

    /* Ukuran teks label lebih besar */
    .large-label {
        font-size: 1.2rem;
        /* Atur ukuran label */
        margin-left: 8px;
        /* Jarak antara radio button dan label */
    }

    /* Styling flexbox */
    .d-flex {
        display: flex;
    }

    .gap-3>* {
        margin-right: 20px;
        /* Jarak antar opsi */
    }

    /* Untuk memastikan elemen sejajar */
    .align-items-center {
        align-items: center;
    }
</style>

@endsection
@section('page')
<main role="main" class="container" style="padding:100px 0 70px 0;">
    <div class="card border-success">
        <div class="card-body">
            <h3>Formulir Pendaftaran</h3>

            <hr>
            <form action="#" class="needs-validation" novalidate id="form-daftar" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card shadow p-4 mb-4">
                    <h4 class="card-title text-primary">Informasi Pendaftaran</h4>
                    <hr>
                    <div class="form-group">
                        <label for="kategori">Pilih Lembaga<span class="text-danger"> *</span></label>
                        <div class="d-flex gap-3 align-items-center" id="kategori">

                        </div>
                        <div id="kategoriError" class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="status">Status Santri<span class="text-danger"> *</span></label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="">- Pilih -</option>
                            <option value="baru">Santri Baru</option>
                            <option value="lanjut">Santri Lanjutan</option>
                        </select>
                        <div id="statusError" class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="card shadow p-4 mb-4">
                    <h4 class="card-title text-primary">Data Pribadi</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik">NIK<span class="text-danger"> *</span></label>
                                <input type="number" name="nik" id="nik" class="form-control" required>
                                <div id="nikError" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap<span class="text-danger"> *</span></label>
                                <input type="text" id="nama" name="nama" class="form-control" required>
                                <div id="namaError" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin<span class="text-danger"> *</span></label>
                                <select class="form-control" id="jk" name="jk" required>
                                    <option value="">- Pilih -</option>
                                    <option value="l">Laki-laki</option>
                                    <option value="p">Perempuan</option>
                                </select>
                                <div id="jkError" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kota">Kota Kelahiran<span class="text-danger"> *</span></label>
                                <input type="text" id="kota" name="kota_lahir" class="form-control" required>
                                <div id="kotaError" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir<span class="text-danger"> *</span></label>
                                <input type="text" id="tgl_lahir" name="tgl_lahir" class="form-control datepicker" required>
                                <div id="tgl_lahirError" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow p-4 mb-4">
                    <h4 class="card-title text-primary">Alamat Lengkap</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="provinsi">Provinsi<span class="text-danger"> *</span></label>
                                <select class="form-control" name="provinsi" id="provinsi" required>
                                    <option value="">- Pilih -</option>
                                </select>
                                <div id="provinsiError" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kabupaten">Kabupaten<span class="text-danger"> *</span></label>
                                <select class="form-control" name="kabupaten" id="kabupaten" required disabled>
                                    <option value="">- Pilih -</option>
                                </select>
                                <div id="kabupatenError" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan<span class="text-danger"> *</span></label>
                                <select class="form-control" name="kecamatan" id="kecamatan" required disabled>
                                    <option value="">- Pilih -</option>
                                </select>
                                <div id="kecamatanError" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kelurahan">Kelurahan<span class="text-danger"> *</span></label>
                                <select class="form-control" name="kelurahan" id="kelurahan" required disabled>
                                    <option value="">- Pilih -</option>
                                </select>
                                <div id="kelurahanError" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Detail<span class="text-danger"> *</span></label>
                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Dusun, RT/RW" required>
                        <div id="alamatError" class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="card shadow p-4 mb-4">
                    <h4 class="card-title text-primary">Data Orang Tua</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ayah">Nama Ayah<span class="text-danger"> *</span></label>
                                <input type="text" name="ayah" id="ayah" class="form-control" required>
                                <div id="ayahError" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan_ayah">Pekerjaan Ayah<span class="text-danger"> *</span></label>
                                <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ibu">Nama Ibu<span class="text-danger"> *</span></label>
                                <input type="text" name="ibu" id="ibu" class="form-control" required>
                                <div id="ibuError" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan_ibu">Pekerjaan Ibu<span class="text-danger"> *</span></label>
                                <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow p-4 mb-4">
                    <h4 class="card-title text-primary">Informasi Asal Sekolah</h4>
                    <hr>
                    <div class="form-group">
                        <label for="asal_sekolah">Asal Sekolah<span class="text-danger"> *</span></label>
                        <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="ijazah">Upload Ijazah<span class="text-danger"> *</span></label>
                        <input type="file" name="ijazah" id="ijazah" class="form-control-file" required>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-paper-plane"></i> Daftar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="bukti">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <h3 class="text-center text-success">Alhamdulillah, pendaftaran anda telah berhasil.</h3>
                    <h3 class="text-center">Nomor urut pendaftaran anda :</h3>
                    <h1 class="text-center text-danger" id="nomor_urut"></h1>
                    <h4 class="text-center">Kode diatas mohon dicatat atau di screenshot sebagai tanda bukti anda telah mendaftar.</h4>
                    <h4 class="text-center">Silahkan melakukan konfirmasi pendaftaran dengan melakukan pembayaran biaya administrasi sebesar Rp. 50.000,- di kantor sekretariat pendaftaran (Kantor YWSPI) atau bisa melalui transfer ke No. Rek 7133192284 A/N Biro Keuangan Bustanul Ulum.</h4>
                    <h4 class="text-center">Bukti transfer bisa dikirim ke No. HP/WA 085258793726 (Imroatus Sholeha)</h4>
                    <button type="button" class="btn btn-primary float-right" onclick="location.reload();">Oke</button>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection

@section('js')

<script>
    $(document).ready(function() {
        //ajax kategori
        $.ajax({
            type: 'GET',
            url: "{{url('api/kategori')}}",
            cache: false,
            success: function(msg) {
                var opt = '';
                $.each(msg, function(key, value) {
                    opt += `<div class="form-check">
                                <input class="form-check-input large-radio" type="radio" name="kategori" id="lembaga${value.id}" value="${value.id}" required>
                                <label class="form-check-label large-label" for="lembaga${value.id}">
                                    ${value.nama_kategori}
                                </label>
                            </div>`
                });
                $("#kategori").append(opt);
            }
        });

        //ajax alamat
        $.ajax({
            type: 'GET',
            url: "{{url('api/provinsi')}}",
            cache: false,
            success: function(msg) {
                var opt = '';
                $.each(msg, function(key, value) {
                    opt += '<option class="text-uppercase" value="' + value.id + '">' + value.nama + '</option>';

                });
                $("#provinsi").append(opt);
            }
        });

        $("#provinsi").change(function() {
            var provinsi = $("#provinsi").val();
            $('#kabupaten').removeAttr('disabled');
            $('#kabupaten').empty();
            $('#kecamatan').empty();
            $('#kelurahan').empty();
            $.ajax({
                type: 'GET',
                url: "{{url('api/kabupaten')}}" + '/' + provinsi,
                cache: false,
                success: function(msg) {
                    var opt = '';
                    $.each(msg, function(key, value) {
                        opt += '<option value="' + value.id + '">' + value.nama + '</option>';
                    });
                    $("#kabupaten").append('<option value="">- Pilih -</option>');
                    $("#kabupaten").append(opt);
                }
            });
        });

        $("#kabupaten").change(function() {
            var kabupaten = $("#kabupaten").val();
            $('#kecamatan').removeAttr('disabled');
            $('#kecamatan').empty();
            $.ajax({
                type: 'GET',
                url: "{{url('api/kecamatan')}}" + '/' + kabupaten,
                cache: false,
                success: function(msg) {
                    var opt = '';
                    $.each(msg, function(key, value) {
                        opt += '<option value="' + value.id + '">' + value.nama + '</option>';
                    });
                    $("#kecamatan").append('<option value="">- Pilih -</option>');
                    $("#kecamatan").append(opt);
                }
            });
        });

        $("#kecamatan").change(function() {
            var kecamatan = $("#kecamatan").val();
            $('#kelurahan').removeAttr('disabled');
            $('#kelurahan').empty();
            $.ajax({
                type: 'GET',
                url: "{{url('api/kelurahan')}}" + '/' + kecamatan,
                cache: false,
                success: function(msg) {
                    var opt = '';
                    $.each(msg, function(key, value) {
                        opt += '<option value="' + value.id + '">' + value.nama + '</option>';
                    });
                    $("#kelurahan").append('<option value="">- Pilih -</option>');
                    $("#kelurahan").append(opt);
                }
            });
        });


        $('#form-daftar').on('submit', function(e) {

            $('#kategori').removeClass('is-invalid');
            $('#status').removeClass('is-invalid');
            $('#nama').removeClass('is-invalid');
            $('#nik').removeClass('is-invalid');
            $('#kota').removeClass('is-invalid');
            $('#tgl_lahir').removeClass('is-invalid');
            $('#jk').removeClass('is-invalid');
            $('#alamat').removeClass('is-invalid');
            $('#provinsi').removeClass('is-invalid');
            $('#kabupaten').removeClass('is-invalid');
            $('#kecamatan').removeClass('is-invalid');
            $('#kelurahan').removeClass('is-invalid');
            $('#ayah').removeClass('is-invalid');
            $('#ibu').removeClass('is-invalid');

            if ($('#kategori').val() == '') {
                $('#kategori').addClass('is-invalid');
                $('#kategori').focus();
                $('#kategoriError').html('* Wajib memilih salah satu lembaga');
                return false;
            } else if ($('#status').val() == '') {
                $('#status').addClass('is-invalid');
                $('#status').focus();
                $('#statusError').html('* Kolom Status Santri harus diisi');
                return false;
            } else if ($('#nik').val() == '') {
                $('#nik').addClass('is-invalid');
                $('#nik').focus();
                $('#nikError').html('* Kolom NIK harus diisi');
                return false;
            } else if ($('#nik').val().length < 16 || $('#nik').val().length > 16) {
                $('#nik').addClass('is-invalid');
                $('#nik').focus();
                $('#nikError').html('* Kolom NIK harus 16 digit');
                return false;
            } else if ($('#nama').val() == '') {
                $('#nama').addClass('is-invalid');
                $('#nama').focus();
                $('#namaError').html('* Kolom nama harus diisi');
                return false;
            } else if (!isNaN($('#nama').val())) {
                $('#nama').addClass('is-invalid');
                $('#nama').focus();
                $('#namaError').html('* Kolom nama harus berupa huruf');
                return false;
            } else if ($('#kota').val() == '') {
                $('#kota').addClass('is-invalid');
                $('#kota').focus();
                $('#kotaError').html('* Kolom Kota Kelahiran harus diisi');
                return false;
            } else if ($('#tgl_lahir').val() == '') {
                $('#tgl_lahir').addClass('is-invalid');
                $('#tgl_lahir').focus();
                $('#tgl_lahirError').html('* Kolom Tanggal lahir harus diisi');
                return false;
            } else if ($('#jk').val() == '') {
                $('#jk').addClass('is-invalid');
                $('#jk').focus();
                $('#jkError').html('* Wajib memilih salah satu Jenis Kelamin');
                return false;
            } else if ($('#alamat').val() == '') {
                $('#alamat').addClass('is-invalid');
                $('#alamat').focus();
                $('#alamatError').html('* Kolom alamat harus diisi');
                return false;
            } else if ($('#provinsi').val() == '') {
                $('#provinsi').addClass('is-invalid');
                $('#provinsi').focus();
                $('#provinsiError').html('* Wajib memilih provinsi');
                return false;
            } else if ($('#kabupaten').val() == '') {
                $('#kabupaten').addClass('is-invalid');
                $('#kabupaten').focus();
                $('#kabupatenError').html('* Wajib memilih kabupaten');
                return false;
            } else if ($('#kecamatan').val() == '') {
                $('#kecamatan').addClass('is-invalid');
                $('#kecamatan').focus();
                $('#kecamatanError').html('* Wajib memilih kecamatan');
                return false;
            } else if ($('#kalurahan').val() == '') {
                $('#kalurahan').addClass('is-invalid');
                $('#kalurahan').focus();
                $('#kalurahanError').html('* Wajib memilih kelurahan');
                return false;
            } else if ($('#ayah').val() == '') {
                $('#ayah').addClass('is-invalid');
                $('#ayah').focus();
                $('#ayahError').html('* Kolom nama ayah harus diisi');
                return false;
            } else if ($('#ibu').val() == '') {
                $('#ibu').addClass('is-invalid');
                $('#ibu').focus();
                $('#ibuError').html('* Kolom pekerjaan ibu harus diisi');
                return false;
            } else if ($('#nohp').val() == '') {
                $('#nohp').addClass('is-invalid');
                $('#nohp').focus();
                $('#nohpError').html('* Wajib mengisi No. HP');
                return false;
            } else if ($('#domisili').val() == '') {
                $('#domisili').addClass('is-invalid');
                $('#domisili').focus();
                $('#domisiliError').html('* Wajib memilih domisili');
                return false;
            } else {
                if (!e.isDefaultPrevented()) {

                    url = "{{ url('/daftar/post') }}";

                    $.ajax({
                        url: url,
                        type: "POST",
                        data: new FormData($('#form-daftar')[0]),
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            $('#submit').attr('disabled', 'disabled');
                        },
                        success: function(data) {
                            $('#submit').removeAttr('disabled', 'disabled');
                            if (data.success == false) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Maaf',
                                    text: 'NIK ini sudah terdaftar',
                                })
                                $('#nik').addClass('is-invalid');
                                $("#nik").focus();
                            } else {
                                $('#bukti').modal('show');
                                $('#nomor_urut').html(data.no_urut);
                            }
                        },
                        error: function(xhr, msg) {
                            console.log(msg + '\n' + xhr.responseText);
                            // swal({
                            //   type: 'error',
                            //   title: 'Oops...',
                            //   text: 'Terjadi Kesalahan!',
                            //   timer: '1500'
                            // })
                        }
                    });
                    return false;
                }
            }

        });

    });
</script>

@endsection