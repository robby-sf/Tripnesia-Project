<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('package_id')->constrained()->onDelete('cascade');
            $table->string('order_id')->unique(); // ID Pesanan unik untuk Midtrans
            $table->decimal('total_amount', 15, 2);
            $table->string('payment_status')->default('pending'); // pending, success, failed, challenge, expire
            $table->string('snap_token')->nullable();
            $table->json('payment_details')->nullable(); // Untuk menyimpan detail respons dari Midtrans
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
