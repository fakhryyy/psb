@extends('index')
@section('page')
<main role="main" class="container" style="padding:200px 0 70px 0;">
    <div class="card border-success">
        <div class="card-body">
            <h3><i class="fas fa-cog"></i> Pengaturan Aplikasi</h3>
            <hr>
            <form action="#" class="needs-validation" novalidate id="form-pengaturan" method="post" enctype="multipart/form-data">
                @csrf
                <div id="first">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="statuspendaftaran">Status Pendaftaran</label>
                            <select class="form-control" id="statuspendaftaran" name="statuspendaftaran" required>
                                <option value="buka" <?= $data['statuspendaftaran'] == 'buka' ? 'selected' : '' ?>>Buka</option>
                                <option value="tutup" <?= $data['statuspendaftaran'] == 'tutup' ? 'selected' : '' ?>>Tutup</option>
                            </select>
                            <div id="statuspendaftaranError" class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-4">
                            <label for="tglbuka">Tanggal Buka</label>
                            <div class="input-group mb-3">
                                <input type="text" id="tglbuka" name="tglbuka" value="<?= $data['tglbuka'] ?>" class="form-control datepicker" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <div id="tglbukaError" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="tgltutup">Tanggal Tutup</label>
                            <div class="input-group mb-3">
                                <input type="text" id="tgltutup" name="tgltutup" value="<?= $data['tgltutup'] ?>" class="form-control datepicker" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <div id="tgltutupError" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="biaya">Biaya BPT</label>
                        <input type="number" name="biaya" id="biaya" value="<?= $data['biaya'] ?>" class="form-control">
                        <div id="biayaError" class="invalid-feedback"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="namabank">Nama Bank</label>
                            <input type="text" name="namabank" id="namabank" value="<?= $data['namabank'] ?>" class="form-control">
                            <div id="namabankError" class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-4">
                            <label for="norek">Nomor Rekening</label>
                            <input type="text" name="norek" id="norek" value="<?= $data['norek'] ?>" class="form-control">
                            <div id="norekError" class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-4">
                            <label for="namarekening">Nama Rekening</label>
                            <input type="text" name="namarekening" id="namarekening" value="<?= $data['namarekening'] ?>" class="form-control">
                            <div id="namarekeningError" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="cppesantren">Kontak Pesantren</label>
                            <input type="text" name="cppesantren" id="cppesantren" value="<?= $data['cppesantren'] ?>" class="form-control">
                            <div id="cppesantrenError" class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-4">
                            <label for="cpsma">Kontak SMA</label>
                            <input type="text" name="cpsma" id="cpsma" value="<?= $data['cpsma'] ?>" class="form-control">
                            <div id="cpsmaError" class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-4">
                            <label for="cpsmp">Kontak SMP</label>
                            <input type="text" name="cpsmp" id="cpsmp" value="<?= $data['cpsmp'] ?>" class="form-control">
                            <div id="cpsmpError" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right" id="submit"><i class="fas fa-save"></i> Simpan Pengaturan</button>
                </div>
            </form>
        </div>
    </div>

</main>
@endsection

@section('js')

<script>
    $(document).ready(function() {
        $('#form-pengaturan').on('submit', function(e) {
            if (!e.isDefaultPrevented()) {

                url = "{{ url('/pengaturan-save') }}";
                $.ajax({
                    url: url,
                    type: "POST",
                    data: new FormData($('#form-pengaturan')[0]),
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('#submit').attr('disabled', 'disabled');
                    },
                    success: function(data) {
                        console.log(data)
                        $('#submit').removeAttr('disabled', 'disabled');
                        Swal.fire({
                            title: "Sukses!",
                            text: "Pengaturan berhasil disimpan",
                            icon: "success"
                        });
                    },
                    error: function(xhr, msg) {
                        console.log(msg + '\n' + xhr.responseText);
                    }
                });
                return false;
            }
        });

        async function getDataByNIK() {
            const url = 'https://indonesian-identification-card-ktp.p.rapidapi.com/api/v3/check?nik=3509086812960003';
            const options = {
                method: 'GET',
                headers: {
                    'X-RapidAPI-Key': 'ef14f2cb07msh0c73f41b37c309fp166be1jsn2828bfaab858',
                    'X-RapidAPI-Host': 'indonesian-identification-card-ktp.p.rapidapi.com'
                }
            };

            try {
                const response = await fetch(url, options);
                if (response.ok) {
                    const result = await response.json();
                    console.log(result);
                } else {
                    console.error('Gagal mendapatkan data. Status:', response.status);
                }
            } catch (error) {
                console.error(error);
            }
        }

        getDataByNIK();

    });
</script>

@endsection