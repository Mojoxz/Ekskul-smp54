<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Admin user
        DB::table('users')->insert([
            'name' => 'Admin SMP 54',
            'email' => 'admin@smp54.sch.id',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Ekskul data
        $ekskuls = [
            ['nama' => 'Basket', 'deskripsi' => 'Ekstrakurikuler Basket', 'jam_mulai' => '15:00:00', 'jam_selesai' => '17:00:00', 'hari' => 'Senin'],
            ['nama' => 'Futsal', 'deskripsi' => 'Ekstrakurikuler Futsal', 'jam_mulai' => '15:00:00', 'jam_selesai' => '17:00:00', 'hari' => 'Selasa'],
            ['nama' => 'Tari', 'deskripsi' => 'Ekstrakurikuler Tari', 'jam_mulai' => '15:00:00', 'jam_selesai' => '17:00:00', 'hari' => 'Rabu'],
            ['nama' => 'PMR', 'deskripsi' => 'Palang Merah Remaja', 'jam_mulai' => '15:00:00', 'jam_selesai' => '17:00:00', 'hari' => 'Kamis'],
            ['nama' => 'Dewan Galang', 'deskripsi' => 'Dewan Galang Pramuka', 'jam_mulai' => '15:00:00', 'jam_selesai' => '17:00:00', 'hari' => 'Jumat'],
            ['nama' => 'Paskip', 'deskripsi' => 'Pasukan Khusus Indonesia Pelajar', 'jam_mulai' => '15:00:00', 'jam_selesai' => '17:00:00', 'hari' => 'Sabtu'],
            ['nama' => 'Band', 'deskripsi' => 'Ekstrakurikuler Band', 'jam_mulai' => '15:00:00', 'jam_selesai' => '17:00:00', 'hari' => 'Sabtu'],
        ];

        foreach ($ekskuls as $ekskul) {
            DB::table('ekskuls')->insert(array_merge($ekskul, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // Sample student
        $user_id = DB::table('users')->insertGetId([
            'name' => 'Muhammad Rizki',
            'email' => 'rizki@student.com',
            'kelas' => '8A',
            'role' => 'murid',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Assign student to basket ekskul
        DB::table('user_ekskuls')->insert([
            'user_id' => $user_id,
            'ekskul_id' => 1, // Basket
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
