<!DOCTYPE html>
<html>

<head>
    <title>Bukti Pendaftaran PSB 2025</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .kop-sekolah {
            text-align: center;
            margin-bottom: 30px;
        }

        .kop-sekolah img {
            width: 80px;
            /* Ukuran logo */
            height: auto;
            margin-bottom: 10px;
        }

        .kop-sekolah h1 {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }

        .kop-sekolah h3 {
            font-size: 16px;
            margin: 5px 0 10px;
            font-style: italic;
        }

        .kop-sekolah p {
            font-size: 14px;
            margin: 0;
            color: #555;
        }

        .content {
            font-size: 16px;
            line-height: 1.6;
        }

        .content h2 {
            font-size: 20px;
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 20px;
            color: #333;
        }

        .content p {
            margin: 10px 0;
        }

        .content .info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .content .info span {
            font-weight: bold;
            color: #444;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #777;
        }

        .footer p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Kop Sekolah -->
        <div class="kop-sekolah">
            <img src="{{ asset('assets/logoBU.png') }}" alt="Logo Sekolah">
            <h1>PONDOK PESANTREN BUSTANUL ULUM MLOKOREJO</h1>
            <h3>Jl. KH. Abdullah Yaqin No. 1-5 Mlokorejo - Puger - Jember</h3>
            <p>No HP: - | Website: www.ponpes-mloko.net</p>
        </div>

        <!-- Konten Bukti Pendaftaran -->
        <div class="content">
            <h4>BUKTI PENDAFTARAN SANTRI BARU</h4>
            <h4>TAHUN AJARAN 2025-2026</h4>
            <hr>
            <div class="info">
                <p><span>KODE PENDAFTARAN:</span> {{ $pendaftaran->no_urut }}</p>
                <p><span>NAMA:</span> {{ $pendaftaran->nama }}</p>
            </div>
            <div class="info">
                <p><span>LEMBAGA:</span> {{ $pendaftaran->kategori }}</p>
                <p><span>TANGGAL PENDAFTARAN:</span> {{ $pendaftaran->created_at->format('d-m-Y') }}</p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>SMK Pelita Nusantara</strong></p>
            <p>"Mencetak Generasi Emas untuk Bangsa"</p>
        </div>
    </div>
</body>

</html>
