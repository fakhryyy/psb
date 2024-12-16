@extends('index')
@section('page')
<main role="main" class="container" style="padding:200px 0 70px 0;">
    <div class="card border-success">
        <div class="card-body">
            <h1 class="mb-4">Manajemen Tahun Akademik</h1>

            <!-- Alert sukses -->
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <!-- Form tambah tahun akademik -->
            <form action="{{ route('akademik.store') }}" method="POST" class="mb-4">
                @csrf
                <div class="form-group">
                    <label for="tahun_akademik">Tahun Akademik</label>
                    <input type="text" name="tahun_akademik" id="tahun_akademik" class="form-control @error('tahun_akademik') is-invalid @enderror" placeholder="Contoh: 2024/2025">
                    @error('tahun_akademik')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>

</main>
@endsection