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
            margin: 0;
            color: #333;
        }

        .content h3 {
            font-size: 20px;
            text-align: center;
            margin: 0 0 10px 0;
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

        .content .info h4 {
            font-size: 15px;
            text-transform: uppercase;
            margin: 0;
            color: #333;
        }

        .content .info p {
            font-size: 15px;
            text-transform: uppercase;
            margin: 0;
        }

        .content .info span {
            font-weight: bold;
            color: #444;
        }

        .notes {
            font-size: 16px;
            line-height: 1.6;
        }
        .notes h2 {
            font-size: 20px;
            text-decoration: underline;
            margin: 0;
        }

        .notes p {
            font-size: 15px;
            text-transform: uppercase;
            text-align: justify;
            margin: 0;
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
            <hr>
        </div>

        <!-- Konten Bukti Pendaftaran -->
        <div class="content">
            <h2>BUKTI PENDAFTARAN SANTRI BARU</h2>
            <h2>TAHUN AJARAN 2025-2026</h2>
            <h3>--------------------</h3>
            @foreach ($data as $key => $value)
                <div class="info">
                    <h4>{{ $key }}:</h4>
                    <p>{{ $value }}</p>
                </div>
            @endforeach
        </div>

        <div class="notes">
            <hr>
            <h2>CATATAN :</h2>
            <p>Silahkan melakukan konfirmasi pendaftaran dengan melakukan pembayaran biaya
                administrasi sebesar <strong>Rp. 100.000,-</strong> di kantor Biro Keuangan Bustanul Ulum (BKBU) atau bisa
                melalui transfer ke No. Rek <strong>7133192284</strong> A/N Biro Keuangan Bustanul Ulum.</p>
            <p>Bukti transfer bisa dikirim ke No. HP/WA <strong>0878-6692-7409</strong> (Contact Person BKBU)</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>Pondok Pesantren Bustanul Ulum Mlokorejo</strong></p>
        </div>
    </div>
</body>

</html>
