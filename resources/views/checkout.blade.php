<!doctype html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Checkout - {{ $package->name }}</title>
    @vite('resources/css/app.css')

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>

    <style>
        .btn-purchase {
            background-color: #2d3748;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            text-align: center;
            display: inline-block;
            width: 100%;
            font-weight: bold;
            transition: background-color 0.3s ease, opacity 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-purchase:hover {
            background-color: #4a5568;
        }

        .btn-purchase:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .content-container {
            margin-top: 80px;
            max-width: 768px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1rem;
            padding-right: 1rem;
            margin-bottom: 3rem;
        }

        .error-message {
            color: #e53e3e;
            background-color: #fed7d7;
            border: 1px solid #f56565;
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
            margin-top: 1rem;
            text-align: left;
            font-size: 0.875rem;
        }

        .info-message {
            color: #856404;
            background-color: #fff3cd;
            border: 1px solid #ffeeba;
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
            margin-top: 1rem;
            text-align: left;
            font-size: 0.875rem;
        }
    </style>
</head>

<body class="font-sans">
    @if (View::exists('components.navbar'))
        <x-Navbar class="navbar"></x-Navbar>
    @else
        <nav class="bg-gray-800 text-white p-4 fixed w-full top-0 z-10">
            <div class="container mx-auto flex justify-between items-center">
                <a href="{{ route('home') }}" class="text-xl font-bold">{{ config('app.name', 'Tripnesia') }}</a>
            </div>
        </nav>
    @endif


    <div class="content-container">
        <h1 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-10 md:mb-12">Checkout Paket Wisata</h1>

        <div id="message-container" class="mb-4"></div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            @if ($package->image)
                <img src="{{ asset('asset/' . $package->image) }}" alt="{{ $package->name }}"
                    class="w-full h-48 md:h-64 object-cover rounded-t-xl">
            @else
                <div class="w-full h-48 md:h-64 bg-gray-200 flex items-center justify-center rounded-t-xl">
                    <span class="text-gray-500">Gambar tidak tersedia</span>
                </div>
            @endif

            <div class="p-6 md:p-8">
                <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-3">{{ $package->name }}</h2>
                @if ($package->description)
                    <p class="text-gray-600 mb-5 text-sm md:text-base">{{ $package->description }}</p>
                @endif

                @if ($package->tickets)
                    <div class="mb-5">
                        <h3 class="text-lg font-semibold text-gray-700 mb-1">Tiket yang Didapat:</h3>
                        <p class="text-gray-600 whitespace-pre-line text-sm md:text-base">{{ $package->tickets }}</p>
                    </div>
                @endif

                <p class="text-xl md:text-2xl font-semibold text-gray-800 mb-6">
                    Harga: <span class="text-blue-600">Rp {{ number_format($package->price, 0, ',', '.') }}</span>
                </p>

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-1 text-sm">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="{{ $user->nama ?? 'Nama Pengguna' }}"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        readonly>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-1 text-sm">Email</label>
                    <input type="email" id="email" value="{{ $user->email ?? 'email@example.com' }}"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        readonly>
                </div>

                <div class="mb-6">
                    <label for="ticket_date" class="block text-gray-700 font-medium mb-1 text-sm">Pilih Tanggal
                        Wisata</label>
                    <input type="date" id="ticket_date" name="ticket_date"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required min="{{ date('Y-m-d') }}">
                    <small class="text-gray-500 text-xs mt-1">Pilih tanggal untuk kunjungan Anda.</small>
                </div>

                <button id="pay-button" class="btn-purchase">
                    Lanjutkan ke Pembayaran
                </button>

                @if ($errors->any())
                    <div class="mt-6 text-red-600 font-semibold text-sm">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {

            const payButton = document.getElementById('pay-button');
            const messageContainer = document.getElementById('message-container');
            const ticketDateInput = document.getElementById('ticket_date');

            if (!payButton || !messageContainer || !ticketDateInput) {
                console.error('Error: Salah satu elemen penting tidak ditemukan.');
                return;
            }

            payButton.addEventListener('click', function() {
                if (!ticketDateInput.value) {
                    messageContainer.innerHTML =
                        `<div class="error-message">Silakan pilih tanggal wisata terlebih dahulu.</div>`;
                    return;
                }

                payButton.disabled = true;
                payButton.innerText = 'Memproses Pembayaran...';
                messageContainer.innerHTML = '';

                fetch("{{ route('checkout.process', $package->id) }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        },
                        body: JSON.stringify({
                            ticket_date: ticketDateInput.value
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(errData => {
                                throw {
                                    status: response.status,
                                    data: errData
                                };
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.snap_token) {
                            window.snap.pay(data.snap_token, {
                                onSuccess: function(result) {
                                    messageContainer.innerHTML =
                                        `<div class="info-message">Pembayaran berhasil! Memproses konfirmasi...</div>`;

                                    let updateStatusUrl =
                                        "{{ route('checkout.updateStatus', ['order_id' => 'ORDER_ID_PLACEHOLDER']) }}";
                                    updateStatusUrl = updateStatusUrl.replace(
                                        'ORDER_ID_PLACEHOLDER', result.order_id);

                                    fetch(updateStatusUrl, {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'Accept': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector(
                                                    'meta[name="csrf-token"]')
                                                .getAttribute('content')
                                        }
                                    }).finally(() => {
                                        alert(
                                            "Pembayaran berhasil! Pesanan Anda sedang menunggu konfirmasi dari admin."
                                        );
                                        window.location.href =
                                            "{{ route('home') }}";
                                    });
                                },
                                onPending: function(result) {
                                    alert(
                                        "Pembayaran Anda sedang diproses. Silakan selesaikan pembayaran."
                                    );
                                    window.location.href = "{{ route('home') }}";
                                },
                                onError: function(result) {
                                    alert("Pembayaran gagal.");
                                    payButton.disabled = false;
                                    payButton.innerText = 'Lanjutkan ke Pembayaran';
                                },
                                onClose: function() {
                                    payButton.disabled = false;
                                    payButton.innerText = 'Lanjutkan ke Pembayaran';
                                    messageContainer.innerHTML =
                                        `<div class="info-message">Anda menutup jendela pembayaran.</div>`;
                                }
                            });
                        } else if (data.error) {
                            messageContainer.innerHTML =
                                `<div class="error-message">${data.error}</div>`;
                            payButton.disabled = false;
                            payButton.innerText = 'Lanjutkan ke Pembayaran';
                        }
                    })
                    .catch(error => {
                        console.error('Fetch Error:', error);
                        let displayError = 'Terjadi kesalahan. Silakan coba lagi.';
                        if (error.status && error.data && error.data.error) {
                            displayError = `Error ${error.status}: ${error.data.error}`;
                        }
                        messageContainer.innerHTML = `<div class="error-message">${displayError}</div>`;
                        payButton.disabled = false;
                        payButton.innerText = 'Lanjutkan ke Pembayaran';
                    });
            });
        });
    </script>
</body>

</html>
