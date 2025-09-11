<?php
// database/migrations/2025_09_11_000001_add_images_to_ekskuls_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('ekskuls', function (Blueprint $table) {
            $table->string('gambar')->nullable()->after('deskripsi');
            $table->string('kategori')->default('lainnya')->after('hari');
            $table->integer('kapasitas')->default(30)->after('kategori');
            $table->integer('jumlah_anggota')->default(0)->after('kapasitas');
        });
    }

    public function down()
    {
        Schema::table('ekskuls', function (Blueprint $table) {
            $table->dropColumn(['gambar', 'kategori', 'kapasitas', 'jumlah_anggota']);
        });
    }
};