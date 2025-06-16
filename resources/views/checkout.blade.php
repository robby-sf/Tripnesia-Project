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

                <div class="mb-6">
                    <label for="email" class="block text-gray-700 font-medium mb-1 text-sm">Email</label>
                    <input type="email" id="email" value="{{ $user->email ?? 'email@example.com' }}"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        readonly>
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
        const payButton = document.getElementById('pay-button');
        const messageContainer = document.getElementById('message-container');

        payButton.addEventListener('click', function() {
            payButton.disabled = true;
            payButton.innerText = 'Memproses Pembayaran...';
            messageContainer.innerHTML = '';

            fetch("{{ route('checkout.process', $package->id) }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
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
                                // Buat URL untuk update status di backend menggunakan helper route() Laravel
                                let updateStatusUrl =
                                    "{{ route('checkout.updateStatusOnSuccess', ['order_id' => 'ORDER_ID_PLACEHOLDER']) }}";
                                updateStatusUrl = updateStatusUrl.replace('ORDER_ID_PLACEHOLDER',
                                    result.order_id);

                                // Kirim request ke backend untuk update status jadi 'awaiting_confirmation'
                                fetch(updateStatusUrl, {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector(
                                            'meta[name="csrf-token"]').getAttribute(
                                            'content')
                                    }
                                }).finally(() => {
                                    // Setelah mencoba update status (baik berhasil atau gagal),
                                    // tampilkan alert dan arahkan ke halaman utama.
                                    alert(
                                        "Pembayaran berhasil! Pesanan Anda sedang menunggu konfirmasi dari admin. Anda akan diarahkan ke halaman utama."
                                        );
                                    window.location.href = "{{ route('home') }}";
                                });
                            },
                            onPending: function(result) {
                                alert(
                                    "Pembayaran Anda sedang diproses. Silakan selesaikan pembayaran. Anda akan diarahkan ke halaman utama."
                                    );
                                window.location.href = "{{ route('home') }}";
                            },
                            onError: function(result) {
                                alert("Pembayaran gagal. Anda akan diarahkan ke halaman utama.");
                                window.location.href = "{{ route('home') }}";
                            },
                            onClose: function() {
                                payButton.disabled = false;
                                payButton.innerText = 'Lanjutkan ke Pembayaran';
                                messageContainer.innerHTML =
                                    `<div class="info-message">Anda menutup jendela pembayaran.</div>`;
                            }
                        });
                    } else if (data.error) {
                        messageContainer.innerHTML = `<div class="error-message">${data.error}</div>`;
                        payButton.disabled = false;
                        payButton.innerText = 'Lanjutkan ke Pembayaran';
                    }
                })
                .catch(error => {
                    let displayError =
                        'Tidak dapat terhubung ke server pembayaran. Periksa koneksi internet Anda.';
                    if (error.status && error.data && error.data.error) {
                        displayError = `Error ${error.status}: ${error.data.error}`;
                    } else if (error.message) {
                        displayError = error.message;
                    }
                    messageContainer.innerHTML = `<div class="error-message">${displayError}</div>`;
                    payButton.disabled = false;
                    payButton.innerText = 'Lanjutkan ke Pembayaran';
                });
        });
    </script>

</body>

</html>
