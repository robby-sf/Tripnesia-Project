<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Tambahkan kolom admin_notes setelah kolom payment_details (atau sesuaikan posisinya)
            // Cek dulu apakah kolomnya sudah ada atau belum, untuk jaga-jaga jika migrasi dijalankan ulang
            if (!Schema::hasColumn('transactions', 'admin_notes')) {
                $table->text('admin_notes')->nullable()->after('payment_details');
            }

            // Tambahkan kolom deleted_at untuk soft deletes setelah kolom updated_at
            if (!Schema::hasColumn('transactions', 'deleted_at')) {
                $table->softDeletes()->after('updated_at');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            if (Schema::hasColumn('transactions', 'admin_notes')) {
                $table->dropColumn('admin_notes');
            }
            if (Schema::hasColumn('transactions', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });
    }
};
