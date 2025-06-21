<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>E-Ticket - {{ $transaction->order_id }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7fafc;
            color: #2d374d;
            margin: 0;
            padding: 20px;
            font-size: 14px;
        }

        .card {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
        }

        .logo-container {
            text-align: center;
            padding: 30px 20px 25px 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        .logo-container img {
            max-height: 50px;
            /* Atur tinggi maksimal logo Anda */
            width: auto;
        }

        .content-container {
            padding: 30px;
        }

        .header-text {
            text-align: center;
            margin-bottom: 30px;
        }

        .header-text h1 {
            font-size: 22px;
            font-weight: 600;
            margin: 0 0 5px 0;
        }

        .header-text p {
            font-size: 14px;
            color: #718096;
            margin: 0;
        }

        .info-grid {
            display: table;
            width: 100%;
            border-collapse: collapse;
        }

        .info-row {
            display: table-row;
        }

        .info-group {
            display: table-cell;
            padding-bottom: 25px;
            width: 50%;
        }

        .info-group label {
            display: block;
            font-size: 11px;
            color: #718096;
            margin-bottom: 4px;
            text-transform: uppercase;
            font-weight: 500;
        }

        .info-group .value {
            font-size: 16px;
            font-weight: 600;
        }

        .main-highlight {
            text-align: center;
            border-top: 1px solid #e2e8f0;
            border-bottom: 1px solid #e2e8f0;
            padding: 20px;
            margin: 10px 0 30px 0;
        }

        .main-highlight label {
            font-size: 12px;
            color: #718096;
            text-transform: uppercase;
            font-weight: 500;
        }

        .main-highlight .value {
            font-size: 20px;
            font-weight: 700;
            color: #2c5282;
            margin-top: 5px;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #a0aec0;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="card">
        <div class="logo-container">
            {{-- Path gambar telah dikoreksi sesuai informasi Anda --}}
            <img src="{{ storage_path('app/public/Asset/Logo Tripnesia.PNG') }}" alt="Tripnesia Logo">
        </div>

        <div class="content-container">
            <div class="header-text">
                <h1>E-TICKET ELEKTRONIK</h1>
                <p>Pesanan {{ $transaction->order_id }}</p>
            </div>

            <div class="main-highlight">
                <label>Paket Perjalanan</label>
                <div class="value">{{ $transaction->package->name }}</div>
            </div>

            <div class="info-grid">
                <div class="info-row">
                    <div class="info-group">
                        <label>Nama Pelanggan</label>
                        <div class="value">{{ $transaction->user->nama }}</div>
                    </div>
                    <div class="info-group">
                        <label>Tanggal Perjalanan</label>
                        <div class="value">{{ \Carbon\Carbon::parse($transaction->ticket_date)->format('d F Y') }}
                        </div>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-group">
                        <label>Status</label>
                        <div class="value">LUNAS & TERKONFIRMASI</div>
                    </div>
                    <div class="info-group">
                        <label>Total Pembayaran</label>
                        <div class="value">Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        Terima kasih telah memilih Tripnesia. Harap simpan e-ticket ini untuk proses check-in.
    </div>

</body>

</html>
