<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->text('tickets')->nullable()->after('description')->comment('Daftar tiket yang didapat, misal: 1 tiket hotel, 2 tiket wisata');
        });
    }

    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn('tickets');
        });
    }
};
