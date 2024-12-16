@extends('index')
@section('css')

<style>
    #second,
    #third,
    #fourth {
        display: none;
    }
</style>

@endsection
@section('page')
<main role="main" class="container" style="padding:100px 0 70px 0;">
    <div class="card border-success">
        <div class="card-body">
            <h3>Formulir Pendaftaran Baru</h3>

            <hr>
            <form action="#" class="needs-validation" novalidate id="form-daftar" method="post" enctype="multipart/form-data">
                @csrf
                <div id="first">
                    <div class="form-group">
                        <label for="email">Pilih Lembaga<span class="text-danger"> *</span></label>
                        <select class="form-control" id="kategori" name="kategori" required>
                            <option value="">- Pilih -</option>
                        </select>
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
                    <div class="form-group">
                        <label for="pwd">NIK<span class="text-danger"> *</span></label>
                        <input type="number" name="nik" id="nik" class="form-control">
                        <div id="nikError" class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Nama Lengkap<span class="text-danger"> *</span></label>
                        <input type="text" id="nama" name="nama" class="form-control">
                        <div id="namaError" class="invalid-feedback"></div>

                        <div class="form-group row" style="margin-top: 10px;">
                            <div class="col-6">
                                <label for="pwd">Kota Kelahiran<span class="text-danger"> *</span></label>
                                <input type="text" id="kota" name="kota_lahir" class="form-control" placeholder="Kota Kelahiran">
                                <div id="kotaError" class="invalid-feedback"></div>
                            </div>
                            <div class="col-6">
                                <label for="pwd">Tanggal Lahir<span class="text-danger"> *</span></label>
                                <div class="input-group mb-3">
                                    <input type="text" id="tgl_lahir" name="tgl_lahir" class="form-control datepicker" aria-describedby="basic-addon2">
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
                                <option value="l">Laki-laki</option>
                                <option value="p">Perempuan</option>
                            </select>
                            <div id="jkError" class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label for="pwd">Alamat (Dusun, RT/RW)<span class="text-danger"> *</span></label>
                            <input type="text" name="alamat" class="form-control" id="alamat">
                            <div id="alamatError" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="email">Provinsi<span class="text-danger"> *</span></label>
                                <select class="form-control" name="provinsi" id="provinsi">
                                    <option value="">- Pilih -</option>
                                </select>
                                <div id="provinsiError" class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-3">
                                <label for="email">Kabupaten<span class="text-danger"> *</span></label>
                                <select class="form-control" name="kabupaten" id="kabupaten" disabled>

                                </select>
                                <div id="kabupatenError" class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-3">
                                <label for="email">Kecamatan<span class="text-danger"> *</span></label>
                                <select class="form-control" name="kecamatan" id="kecamatan" disabled>

                                </select>
                                <div id="kecamatanError" class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-3">
                                <label for="email">Kelurahan<span class="text-danger"> *</span></label>
                                <select class="form-control" name="kelurahan" id="kelurahan" disabled>

                                </select>
                                <div id="kelurahanError" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Nama Ayah<span class="text-danger"> *</span></label>
                            <input type="text" name="ayah" id="ayah" class="form-control">
                            <div id="ayahError" class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label for="pwd">Nama Ibu<span class="text-danger"> *</span></label>
                            <input type="text" name="ibu" id="ibu" class="form-control">
                            <div id="ibuError" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">No. HP/Whatsapp<span class="text-danger"> (Pastikan nomor yg anda masukkan sudah benar dan terdaftar pada aplikasi Whatsapp)</span></label>
                            <input type="number" name="nohp" class="form-control" id="nohp" placeholder="082xxxxxxxxx">
                            <div id="nohpError" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="email">Domisili<span class="text-danger"> *</span></label>
                            <select class="form-control" id="domisili" name="domisili">
                                <option value="">- Pilih -</option>
                                <option value="dalbar">PPBU Mlokorejo</option>
                                <option value="daltim">PPBU Mlokorejo Daltim</option>
                            </select>
                            <div id="domisiliError" class="invalid-feedback"></div>
                        </div>
                        <button type="submit" class="btn btn-success float-right" id="submit"><i class="fas fa-paper-plane"></i> Simpan</button>
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
                    if (value.id == 1) {
                        opt += '<option value="' + value.id + '">' + value.nama_kategori + '</option>';
                    } else {
                        opt += '<option value="' + value.id + '">Pesantren dan ' + value.nama_kategori + '</option>';
                    }


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

        // $("#nik").change(function() {
        //     var nik = $("#nik").val();
        //     $.ajax({
        //         type: 'GET',
        //         url: "{{url('/cekNik')}}" + '/' + nik,
        //         cache: false,
        //         success: function(msg) {
        //             if (msg == 'y') {
        //                 Swal.fire({
        //                     icon: 'error',
        //                     title: 'Maaf',
        //                     text: 'NIK ini sudah terdaftar',
        //                 })
        //                 $("#nik").val('');
        //                 $("#nik").focus();
        //             }
        //         }
        //     });
        // });

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
                        // console.log(value.nama)
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
                        // console.log(value.nama)
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
                        // console.log(value.nama)
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
                            if(data.success == false){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Maaf',
                                    text: 'NIK ini sudah terdaftar',
                                })
                                $('#nik').addClass('is-invalid');
                                $("#nik").focus();
                            }else{
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
