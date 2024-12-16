@extends('index')

@section('page')
<main role="main" class="container" style="padding:200px 0 70px 0; text-align:center">
    <h1 class="cover-heading text-danger">Pendaftaran Belum Dibuka</h1>
    <p class="lead">Pendaftaran Peserta Didik Baru, akan di buka pada tanggal <strong><?= $set->tglbuka ?></strong>.</p>
    <p class="lead">
        <a href="{{url('/')}}" class="btn btn-lg btn-success">Kembali ke Halaman Utama</a>
    </p>
</main>
@endsection