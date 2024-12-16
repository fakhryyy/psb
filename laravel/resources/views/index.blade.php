<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>PSB PPBU</title>
    <link rel="icon" href="logo.ico">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap-datepicker.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('assets/fa/css/all.css')}}"> -->
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/data-table/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/data-table/bootstrap/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/data-table/responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/data-table/responsive/css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/wa/floating-wpp.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">

    @yield('css')

</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark py-0 shadow bg-custom">
            <div class="container-fluid">

                <a class="navbar-brand " href="{{url('/')}}">
                    <img src="{{asset('assets/logoBU.png')}}" width="50" height="50" class="d-inline-block align-center" alt="">
                    <span class="text-uppercase pc" style="font-weight:bold;">PSB Bustanul Ulum Mlokorejo</span>
                </a>
                @auth
                <button class="navbar-toggler my-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item nav-atas <?= Request::segment(1) == 'daftar' ? 'active' : ''; ?>">
                            <strong><a class="nav-link <?= Request::segment(1) == 'daftar' ? 'text-white' : ''; ?>" href="{{url('/daftar')}}">Daftar</a></strong>
                        </li>
                        <li class="nav-item nav-atas <?= Request::segment(1) == 'data-santri' ? 'active' : ''; ?>">
                            <strong><a class="nav-link <?= Request::segment(1) == 'data-santri' ? 'text-white' : ''; ?>" href="{{url('/data-santri')}}">Data Santri</a></strong>
                        </li>
                        @if(Auth::user()->id == '1')
                        <li class="nav-item nav-atas <?= Request::segment(1) == 'pengaturan' ? 'active' : ''; ?>">
                            <strong><a class="nav-link > <?= Request::segment(1) == 'pengaturan' ? 'text-white' : ''; ?>" href="{{url('/pengaturan')}}">Pengaturan</a></strong>
                        </li>
                        @endif
                        <li class="nav-item nav-atas dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <h6 class="dropdown-header">{{ Auth::user()->name }}</h6>
                                <a class="dropdown-item " id="btn-logout" href="#">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Keluar') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                @else
                <div class="nav-atas ml-auto">
                    <a class="btn btn-light btn-lg btn-daftar" href="{{url('/daftar')}}">Pendaftaran </a>
                    <a class="btn btn-light btn-lg btn-login " href="{{url('/login')}}">Login</a>
                </div>
                @endauth
            </div>
        </nav>
    </header>
    @yield('jumbotron')
    @yield('page')

    <div id="chat"></div>

    <div class="modal" tabindex="-1" role="dialog" id="promo">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="text-center text-primary">Ayo cepat daftarkan diri anda!!</h3>
                    <h1 class="blink text-center" style="text-decoration:underline;">Kuota Terbatas</h1>
                    <h3 class=" text-center text-success">Insyaallah Barokah</h3>


                </div>
            </div>
        </div>
    </div>

    <footer class="bg-light mt-auto">
        <div class="container py-3 text-center" style="font-size: 10pt;">
            <strong>Sekretariat : Pondok Pesantren Bustanul Ulum Mlokorejo | Jln. KH Abdullah Yaqien No. 1-5 Mlokorejo </strong>
        </div>
    </footer>
    <script src="{{asset('assets/bootstrap/js/jquery.js')}}"></script>
    <script src="{{asset('assets/fa/js/all.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('assets/data-table/bootstrap/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/data-table/responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/data-table/responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('js')
    <script>
        //datepicker
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });

        $(document).ready(function() {
            $('#btn-logout').on('click', function(e) {
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Ingin keluar dari aplikasi ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Lanjutkan!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('logout-form').submit();;
                    }
                })
            });
        });
    </script>

</body>

</html>