<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Package;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $packages = Package::all();

        $statuses = ['pending', 'paid', 'failed'];

        foreach ($users as $user) {
            // Setiap user melakukan 3 transaksi
            for ($i = 0; $i < 3; $i++) {
                $package = $packages->random();

                Transaction::create([
                    'user_id' => $user->id,
                    'package_id' => $package->id,
                    'ticket_date' => Carbon::now()->addDays(rand(1, 30))->format('Y-m-d'),
                    'order_id' => strtoupper(Str::random(10)),
                    'total_amount' => $package->price ?? rand(100000, 500000), // fallback jika tidak ada kolom price
                    'payment_status' => $statuses[array_rand($statuses)],
                    'snap_token' => Str::uuid(),
                    'payment_details' => json_encode([
                        'method' => 'bank_transfer',
                        'provider' => 'bca',
                        'transaction_time' => Carbon::now()->toDateTimeString(),
                    ]),
                    'admin_notes' => rand(0, 1) ? 'Diproses oleh admin.' : null,
                ]);
            }
        }
    }
}
