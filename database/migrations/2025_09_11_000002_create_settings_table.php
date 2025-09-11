<?php
// database/migrations/2025_09_11_000002_create_settings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('type')->default('string'); // string, text, boolean, integer, file
            $table->string('group')->default('general');
            $table->string('label');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Insert default settings
        DB::table('settings')->insert([
            [
                'key' => 'site_name',
                'value' => 'SMP 54 Surabaya',
                'type' => 'string',
                'group' => 'general',
                'label' => 'Nama Sekolah',
                'description' => 'Nama resmi sekolah',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'site_address',
                'value' => 'Jl. Pendidikan Raya No. 54, Sukolilo, Surabaya 60111',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Alamat Sekolah',
                'description' => 'Alamat lengkap sekolah',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'site_phone',
                'value' => '(031) 123-4567',
                'type' => 'string',
                'group' => 'contact',
                'label' => 'Nomor Telepon',
                'description' => 'Nomor telepon sekolah',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'site_email',
                'value' => 'info@smp54sby.sch.id',
                'type' => 'string',
                'group' => 'contact',
                'label' => 'Email Sekolah',
                'description' => 'Email resmi sekolah',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'hero_image',
                'value' => 'images/hero-bg.jpg',
                'type' => 'file',
                'group' => 'appearance',
                'label' => 'Gambar Hero',
                'description' => 'Gambar latar belakang halaman utama',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
};