@extends('index')
@section('css')
<style>
    .jumbotron {
        border-radius: 0 0 150px 0;
        padding: 120px 0 120px 0;
    }
    .logo-utama{
        -webkit-animation: upDown 5s infinite;
        animation: upDown 5s infinite;
    }
    
    @-webkit-keyframes upDown {
      0% {
        -webkit-transform: translateY(-20px);
        transform: translateY(-20px);
      }
      50% {
        -webkit-transform: translateY(20px);
        transform: translateY(20px);
      }
      100% {
        -webkit-transform: translateY(-20px);
        transform: translateY(-20px);
      }
    }
    
    @keyframes upDown {
      0% {
        -webkit-transform: translateY(-20px);
        transform: translateY(-20px);
      }
      50% {
        -webkit-transform: translateY(20px);
        transform: translateY(20px);
      }
      100% {
        -webkit-transform: translateY(-20px);
        transform: translateY(-20px);
      }
    }

    .home-img img {
        max-width: 400px;
    }

    .text-home {
        color: #fff;
    }

    .text-home h1 {
        font-weight: bolder;
    }

    .text-home .p2 {
        font-weight: bold;
    }
</style>
@endsection
@section('jumbotron')

<div class="jumbotron bg-custom d-flex align-items-center ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5 text-center">
                <div class="home-img">
                    <img class="logo-utama" src="{{asset('assets/logoBU.png')}}">
                </div>
            </div>
            <div class="col-md-7">
                <div class="text-home">
                    <h1>Penerimaan Santri Baru</h1>
                    <h4>Pondok Pesantren Bustanul Ulum Mlokorejo</h4>

                    <p class="mt-3 p1">Bustanul Ulum Boarding School for Education and Science</p>
                    <p class="p2">Tahun Pelajaran 2024 - 2025</p>

                    <a class="btn btn-light btn-lg btn-daftar" href="{{url('/daftar')}}">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page')
<main role="main" class="container pt-3 " style="padding-bottom:70px;">
    <div class="row">
        <span class="form-control input-lg">
            <marquee onmouseout="this.start()" onmouseover="this.stop()">
                <b style="color: red;">Telah di Buka Pendaftaran Santri Baru Pondok Pesantren Bustanul Ulum Mlokorejo Tahun Pelajaran <?= date('Y')?>-<?= date('Y')+1?></b>
            </marquee>
        </span>
    </div>
    </div>

    <div class="row  mt-3">
        <div class="col-md-8">
            <div class="card border border-success mb-3">
                <div class="card-header bg-success">
                    <b class="text-white">Prosedur Penerimaan Santri Baru</b>
                </div>
                <div class="card-body p-0">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{asset('download/dibuka.jpg')}}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('download/prosedur.jpg')}}" alt="Second slide">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border border-success mb-3">
                <div class="card-header bg-success">
                    <b class="text-white">Rincian Biaya</b>
                </div>
                <div class="card-body p-2">
                    <div id="accordion">

                        <div class="card">
                            <div class="card-header bg-primary">
                                <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                    <strong class="text-white">Pesantren <span class="float-right"><i class="fas fa-sort-down "></i></span></strong>
                                </a>

                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                <div class="card-body p-0">
                                    <img src="{{asset('download/madin.jpg')}}" alt="error" class="w-100">
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header bg-primary">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                    <strong class="text-white">SMP Plus Bustanul Ulum Mlokorejo <span class="float-right"><i class="fas fa-sort-down "></i></span></strong>
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                <div class="card-body p-0">
                                    <img src="{{asset('download/smp.jpg')}}" alt="error" class="w-100">
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header bg-primary">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                                    <strong class="text-white">SMA Plus Bustanul Ulum Mlokorejo <span class="float-right"><i class="fas fa-sort-down "></i></span></strong>
                                </a>
                            </div>
                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                <div class="card-body p-0">
                                    <img src="{{asset('download/sma.jpg')}}" alt="error" class="w-100">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="bg-danger p-2 my-2 text-white text-center">
                        <strong>BIAYA PENDIDIKAN TERPADU (BPT)/BULAN :</strong>
                    </div>
                    <table class="table table-striped table-bordered text-danger">
                        <tr>
                            <th>SANTRI SMP/SMA + PONDOK</th>
                            <th>BPT Rp. <?= number_format($set->biaya, 0, ',', '.'); ?>,-</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border border-primary mb-3">
                <div class="card-header bg-primary">
                    <b class="text-white">Grafik Pendaftaran</b>
                </div>
                <div class="card-body p-0">
                    <canvas id="myChart" width="400" height="300"></canvas>
                </div>
            </div>

            <div class="card border border-success mb-3">
                <div class="card-header bg-success">
                    <b class="text-white">Kunjungi Website Kami</b>
                </div>
                <div class="card-body">
                    <a href="https://ponpes-mloko.net" target="_blank" class="btn btn-success form-control"><i class="fas fa-link"></i> ponpes-mloko.net</a>
                </div>
            </div>
            <div class="card border border-primary mb-3">
                <div class="card-header bg-primary">
                    <b class="text-white">Informasi Pondok Pesantren</b>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-responsive info-sekolah mb-0" style="font-size:10pt;">
                        <tr>
                            <th scope="row">Yayasan</th>
                            <td>Yayasan Wakaf Sosial Pendidikan Islam</td>
                        </tr>
                        <tr>
                            <th scope="row">Nama Pesantren</th>
                            <td>Pondok Pesantren Bustanul Ulum Mlokorejo</td>
                        </tr>
                        <tr>
                            <th scope="row">Alamat</th>
                            <td>Jln. KH. Abdullah Yaqien No. 1-5 Mlokorejo</td>
                        </tr>
                        <tr>
                            <th scope="row">Desa</th>
                            <td>Mlokorejo</td>
                        </tr>
                        <tr>
                            <th scope="row">Kecamatan</th>
                            <td>Puger</td>
                        </tr>
                        <tr>
                            <th scope="row">Kabupaten</th>
                            <td>Jember</td>
                        </tr>
                        <tr>
                            <th scope="row">Kode Pos</th>
                            <td>68164</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card border border-primary  mb-3">
                <div class="card-header bg-primary">
                    <b class="text-white">Kontak Panitia</b>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped  mb-0" style="font-size:10pt;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">No. HP/WA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"><i class="fas fa-user"></i></th>
                                <td>Panitia Pesantren</td>
                                <td><a href="https://wa.me/<?= $set->cppesantren ?>" target="_blank" rel="noopener noreferrer"><?= $set->cppesantren ?></a></td>
                            </tr>
                            <tr>
                                <th scope="row"><i class="fas fa-user"></i></th>
                                <td>Panitia SMA</td>
                                <td><a href="https://wa.me/<?= $set->cpsma ?>" target="_blank" rel="noopener noreferrer"><?= $set->cpsma ?></a></td>
                            </tr>
                            <tr>
                                <th scope="row"><i class="fas fa-user"></i></th>
                                <td>Panitia SMP</td>
                                </td>
                                <td><a href="https://wa.me/<?= $set->cpsmp ?>" target="_blank" rel="noopener noreferrer"><?= $set->cpsmp ?></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card border border-primary mb-3">
                <div class="card-header bg-primary">
                    <b class="text-white">Kuota Pendaftaran</b>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped info-sekolah mb-0" style="font-size:10pt;">
                        <tr>
                            <th scope="row">SMA</th>
                            <td>200 Peserta Didik</td>
                        </tr>
                        <tr>
                            <th scope="row">SMP</th>
                            <td>250 Peserta Didik</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card border border-primary">
                <div class="card-header bg-primary">
                    <b class="text-white">Lokasi Pesantren</b>
                </div>
                <div class="card-body p-0">
                    {{-- <a href="{{url('/download/pesantren')}}" class="btn btn-success form-control mb-2"><i class="fas fa-download"></i> Download Brosur Pesantren</a>
                    <a href="{{url('/download/sma')}}" class="btn btn-warning form-control mb-2"><i class="fas fa-download"></i> Download Brosur SMA</a>
                    <a href="{{url('/download/smp')}}" class="btn btn-danger form-control"><i class="fas fa-download"></i> Download Brosur SMP</a> --}}
                    <div style="overflow:hidden;width: 100%;position: relative;"><iframe class="w-100" height="250" src="https://maps.google.com/maps?hl=en&amp;q=bustanul ulum mlokorejo+(SMA Plus Bustanul Ulum Mlokorejo)&amp;ie=UTF8&amp;t=&amp;z=17&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        <div style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;"><small style="line-height: 1.8;font-size: 0px;background: #fff;"> <a href="https://googlemapsembed.net/">Embed Google Map</a> </small></div>
                        <style>
                            .nvs {
                                position: relative;
                                text-align: right;
                                height: 325px;
                                width: 643px;
                            }

                            #gmap_canvas img {
                                max-width: none !important;
                                background: none !important
                            }
                        </style>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('js')
<script>
    // $('#promo').modal('show');
</script>
<script>
    const dataChart = {
        "labels": ["MADIN", "SMA", "SMP"],
        "datasets": [{
            "label": "Jumlah",
            "data": [
                <?= json_encode($jmlmadin) ?>, 
                <?= json_encode($jmlsma) ?>, 
                <?= json_encode($jmlsmp) ?>
            ],
            "backgroundColor": [
                "rgb(255, 99, 132)",
                "rgb(54, 162, 235)",
                "rgb(255, 205, 86)"
            ],
            "borderColor": [
                "rgb(255, 99, 132)",
                "rgb(54, 162, 235)",
                "rgb(255, 205, 86)"
            ],
            "borderWidth": 1
        }]
    };
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: dataChart,
        options: {
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }],
            },
            tooltips: {
                callbacks: {
                    label: (tooltipItem, data) => {
                        let i = tooltipItem.index;
                        return data.labels[i] + ': ' + data.datasets[0].data[i];
                    }
                }
            },
            plugins: {
                datalabels: {
                    anchor: 'end',
                    align: 'end',
                    formatter: (value, context) => {
                        return value;
                    },
                    color: '#000',
                    font: {
                        weight: 'bold'
                    }
                }
            }
        },
        plugins: [ChartDataLabels]
    });

</script>

@endsection