<!DOCTYPE html>
<html>

<head>
    <title>Tiket Anda Telah Diterbitkan</title>
    <link rel="icon" type="png" href="/Asset/icon Web.png">
</head>

<body>
    <h2>Halo, {{ $transaction->user->nama }}!</h2>
    <p>Pesanan Anda untuk paket wisata <strong>{{ $transaction->package->name }}</strong> dengan ID
        <strong>{{ $transaction->order_id }}</strong> telah dikonfirmasi.
    </p>
    <p>E-Ticket Anda terlampir dalam email ini. Silakan unduh dan tunjukkan pada saat kedatangan.</p>
    <p>Detail Pesanan:</p>
    <ul>
        <li>Paket: {{ $transaction->package->name }}</li>
        <li>Tanggal Tiket: {{ \Carbon\Carbon::parse($transaction->ticket_date)->format('d F Y') }}</li>
        <li>Total Pembayaran: Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</li>
    </ul>
    <p>Terima kasih telah mempercayai Tripnesia!</p>
    <br>
    <p>Salam Hangat,</p>
    <p>Tim Tripnesia</p>
</body>

</html>
