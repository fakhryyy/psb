@extends('index')
@section('css')
<style>
    html,
    body {
        background-image: url('{{asset('assets/bg.jpg')}}');
        background-size: cover;
    }
</style>
@endsection
@section('page')
<main role="main" class="container" style="padding-top : 150px;">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <!--<div class="row pb-5">-->
            <!--    <div class="col-3">-->
            <!--        <img src="{{asset('assets/ywspi.png')}}" width="100">-->
            <!--    </div>-->
            <!--    <div class="col-3">-->
            <!--        <img src="{{asset('assets/logoBU.png')}}" width="100">-->
            <!--    </div>-->
            <!--    <div class="col-3">-->
            <!--        <img src="{{asset('assets/logo-sma.png')}}" width="100">-->
            <!--    </div>-->
            <!--    <div class="col-3">-->
            <!--        <img src="{{asset('assets/logo-smp.png')}}" width="100">-->
            <!--    </div>-->
            <!--</div>-->
            <div class="card shadow">
                <h4 class="card-title d-flex justify-content-center pt-3 pb-3 bg-light">{{ __('LOGIN ADMIN PSB') }}</h4>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
        
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><strong><i class="fas fa-user"></i></strong></span>
                                </div>
                                <input type="text" class="form-control form-control-lg @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus id="username" placeholder="Masukkan Username" aria-describedby="basic-addon1">
                            </div>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                                </div>
                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukkan Password" aria-describedby="basic-addon1">
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                    <label class="form-check-label" for="remember">
                                        <strong> {{ __('Ingat Saya') }}</strong>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success btn-lg float-right">
                                    <i class="fas fa-sign-in-alt"></i> {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
             </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script>
    $('.footer').addClass('fixed-bottom');
    $('#chat').hide();
</script>
@endsection