<?php
// database/seeders/DefaultDataSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Ekskul;
use App\Models\Berita;

class DefaultDataSeeder extends Seeder
{
    public function run()
    {
        // Create Admin User
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@smp54sby.sch.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'kelas' => null,
        ]);

        // Create Sample Ekstrakurikuler
        $ekskuls = [
            [
                'nama' => 'Basket',
                'deskripsi' => 'Kegiatan olahraga bola basket untuk mengembangkan kemampuan fisik dan kerjasama tim',
                'jam_mulai' => '15:30:00',
                'jam_selesai' => '17:00:00',
                'hari' => 'Selasa, Kamis',
                'kategori' => 'olahraga',
                'kapasitas' => 20,
                'status' => true
            ],
            [
                'nama' => 'Band Sekolah',
                'deskripsi' => 'Ekstrakurikuler musik untuk mengembangkan bakat bermusik dan kreativitas',
                'jam_mulai' => '15:30:00',
                'jam_selesai' => '17:30:00',
                'hari' => 'Rabu, Jumat',
                'kategori' => 'seni',
                'kapasitas' => 15,
                'status' => true
            ],
            [
                'nama' => 'English Club',
                'deskripsi' => 'Klub bahasa Inggris untuk meningkatkan kemampuan berbahasa Inggris',
                'jam_mulai' => '15:00:00',
                'jam_selesai' => '16:30:00',
                'hari' => 'Senin, Rabu',
                'kategori' => 'akademik',
                'kapasitas' => 25,
                'status' => true
            ],
            [
                'nama' => 'Sepak Bola',
                'deskripsi' => 'Olahraga sepak bola untuk melatih kebugaran dan sportivitas',
                'jam_mulai' => '15:30:00',
                'jam_selesai' => '17:30:00',
                'hari' => 'Senin, Kamis',
                'kategori' => 'olahraga',
                'kapasitas' => 22,
                'status' => true
            ],
            [
                'nama' => 'Tari Tradisional',
                'deskripsi' => 'Ekstrakurikuler tari untuk melestarikan budaya Indonesia',
                'jam_mulai' => '15:00:00',
                'jam_selesai' => '16:30:00',
                'hari' => 'Selasa, Jumat',
                'kategori' => 'seni',
                'kapasitas' => 18,
                'status' => true
            ],
            [
                'nama' => 'Science Club',
                'deskripsi' => 'Klub sains untuk mengeksplorasi dunia pengetahuan dan teknologi',
                'jam_mulai' => '15:30:00',
                'jam_selesai' => '17:00:00',
                'hari' => 'Rabu',
                'kategori' => 'akademik',
                'kapasitas' => 20,
                'status' => true
            ],
            [
                'nama' => 'Voli',
                'deskripsi' => 'Olahraga bola voli untuk mengembangkan koordinasi dan kerjasama',
                'jam_mulai' => '16:00:00',
                'jam_selesai' => '17:30:00',
                'hari' => 'Selasa, Kamis',
                'kategori' => 'olahraga',
                'kapasitas' => 12,
                'status' => true
            ],
            [
                'nama' => 'Pramuka',
                'deskripsi' => 'Gerakan Pramuka untuk membentuk karakter dan kepemimpinan',
                'jam_mulai' => '14:00:00',
                'jam_selesai' => '16:00:00',
                'hari' => 'Sabtu',
                'kategori' => 'karakter',
                'kapasitas' => 30,
                'status' => true
            ]
        ];

        foreach ($ekskuls as $ekskul) {
            Ekskul::create($ekskul);
        }

        // Create Sample Students
        $students = [
            [
                'name' => 'Ahmad Rizki',
                'email' => 'ahmad.rizki@student.com',
                'password' => Hash::make('password'),
                'role' => 'murid',
                'kelas' => '8A',
            ],
            [
                'name' => 'Siti Nurhaliza',
                'email' => 'siti.nurhaliza@student.com',
                'password' => Hash::make('password'),
                'role' => 'murid',
                'kelas' => '8B',
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@student.com',
                'password' => Hash::make('password'),
                'role' => 'murid',
                'kelas' => '9A',
            ]
        ];

        foreach ($students as $student) {
            $user = User::create($student);
            // Assign random ekstrakurikuler to students
            $randomEkskuls = Ekskul::inRandomOrder()->take(2)->pluck('id');
            $user->ekskuls()->attach($randomEkskuls);
        }

        // Create Sample News
        $beritas = [
            [
                'judul' => 'Prestasi Gemilang Tim Basket SMP 54 Surabaya di Kompetisi Antar Sekolah',
                'konten' => 'Tim basket SMP 54 Surabaya berhasil meraih juara 1 dalam kompetisi basket antar SMP se-Surabaya yang diselenggarakan pada bulan lalu. Prestasi ini merupakan hasil dari latihan rutin dan kerja keras para siswa yang tergabung dalam ekstrakurikuler basket.

Kompetisi yang diikuti oleh 32 sekolah dari seluruh Surabaya ini berlangsung selama 2 minggu. Tim basket SMP 54 Surabaya yang dipimpin oleh kapten Ahmad Rizki (kelas 9A) berhasil mengalahkan semua lawan dengan permainan yang solid dan kompak.

"Kami sangat bangga dengan prestasi yang diraih oleh tim basket. Ini membuktikan bahwa latihan yang konsisten dan semangat pantang menyerah dapat menghasilkan prestasi yang membanggakan," ujar Bapak Hendro selaku pembina ekstrakurikuler basket.

Prestasi ini juga tidak lepas dari dukungan penuh sekolah dan orang tua siswa. Sekolah berkomitmen untuk terus mendukung pengembangan bakat dan minat siswa melalui kegiatan ekstrakurikuler.',
                'user_id' => $admin->id,
                'status' => true,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2)
            ],
            [
                'judul' => 'Penampilan Memukau Band Sekolah dalam Acara Pentas Seni',
                'konten' => 'Band sekolah SMP 54 Surabaya kembali memukau penonton dalam acara Pentas Seni yang diselenggarakan minggu lalu. Dengan membawakan berbagai lagu populer dan lagu daerah, band sekolah berhasil mencuri perhatian seluruh audience.

Acara Pentas Seni yang dihadiri oleh seluruh siswa, guru, dan orang tua ini menjadi ajang untuk menampilkan berbagai bakat siswa. Band sekolah yang beranggotakan 8 siswa ini tampil dengan sangat profesional dan penuh semangat.

"Performa mereka benar-benar luar biasa. Latihan yang intensif selama berbulan-bulan membuahkan hasil yang memuaskan," kata Ibu Sari, guru pembina ekstrakurikuler musik.

Ke depannya, band sekolah merencanakan untuk mengikuti kompetisi musik antar sekolah tingkat provinsi. Sekolah akan memberikan dukungan penuh untuk persiapan kompetisi tersebut.',
                'user_id' => $admin->id,
                'status' => true,
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5)
            ],
            [
                'judul' => 'Implementasi Sistem Presensi Digital untuk Ekstrakurikuler',
                'konten' => 'SMP 54 Surabaya dengan bangga memperkenalkan sistem presensi digital terbaru untuk semua kegiatan ekstrakurikuler. Sistem ini dirancang untuk memudahkan siswa dalam melakukan absensi dan membantu guru pembina dalam memantau kehadiran siswa.

Dengan sistem ini, siswa dapat melakukan presensi secara online melalui website sekolah. Fitur-fitur yang tersedia meliputi:
- Presensi online yang mudah dan cepat
- Monitoring kehadiran real-time
- Laporan statistik kehadiran
- Notifikasi untuk siswa dan orang tua

"Sistem ini akan sangat membantu dalam pengelolaan ekstrakurikuler. Data kehadiran akan lebih akurat dan mudah dipantau," ungkap Kepala Sekolah, Bapak Ahmad Suryanto.

Sistem presensi digital ini mulai diterapkan pada semester ini dan diharapkan dapat meningkatkan efisiensi pengelolaan kegiatan ekstrakurikuler di sekolah.',
                'user_id' => $admin->id,
                'status' => true,
                'created_at' => now()->subDays(7),
                'updated_at' => now()->subDays(7)
            ],
            [
                'judul' => 'English Club Raih Juara Harapan 1 dalam Lomba Debate',
                'konten' => 'Prestasi membanggakan kembali diraih oleh siswa-siswi SMP 54 Surabaya. Tim English Club berhasil meraih Juara Harapan 1 dalam lomba debat bahasa Inggris tingkat SMP se-Jawa Timur.

Kompetisi yang diadakan di Universitas Airlangga ini diikuti oleh 45 tim dari berbagai sekolah di Jawa Timur. Tim yang terdiri dari Siti Nurhaliza (9B), Andi Pratama (9A), dan Dini Safitri (8C) tampil dengan sangat mengesankan.

Tema yang diangkat dalam kompetisi adalah "Technology and Education in Digital Era". Para peserta diminta untuk mempresentasikan argumen mereka dalam bahasa Inggris dengan lancar dan meyakinkan.

"Ini adalah hasil dari kerja keras siswa-siswa yang mengikuti English Club secara konsisten. Mereka berlatih speaking dan debating setiap minggu," kata Miss Diana, pembina English Club.

Prestasi ini semakin memotivasi siswa lain untuk aktif dalam kegiatan ekstrakurikuler akademik.',
                'user_id' => $admin->id,
                'status' => true,
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(10)
            ],
            [
                'judul' => 'Persiapan Festival Tari Nusantara Tingkat Nasional',
                'konten' => 'Tim tari tradisional SMP 54 Surabaya sedang mempersiapkan diri untuk mengikuti Festival Tari Nusantara tingkat nasional yang akan diselenggarakan di Jakarta bulan depan.

Tim yang beranggotakan 12 siswa ini akan membawakan tarian khas Jawa Timur yaitu "Tari Remo" yang telah dimodifikasi dengan sentuhan modern. Persiapan sudah dilakukan sejak 3 bulan yang lalu dengan latihan intensif setiap hari.

"Kami optimis dengan persiapan yang sudah dilakukan. Anak-anak sangat bersemangat dan tekun dalam berlatih," ujar Ibu Ratna, pelatih tari tradisional sekolah.

Festival ini akan diikuti oleh 50 sekolah terpilih dari seluruh Indonesia. Selain sebagai ajang kompetisi, festival ini juga bertujuan untuk melestarikan budaya tari tradisional Indonesia.

Sekolah memberikan dukungan penuh dengan menyediakan kostum dan properti tari yang berkualitas. Semoga tim tari SMP 54 Surabaya dapat meraih prestasi terbaik.',
                'user_id' => $admin->id,
                'status' => true,
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3)
            ],
            [
                'judul' => 'Workshop Robotika untuk Science Club',
                'konten' => 'Science Club SMP 54 Surabaya mengadakan workshop robotika yang dihadiri oleh 25 siswa yang tergabung dalam ekstrakurikuler sains. Workshop ini bertujuan untuk mengenalkan teknologi robotika dan programming kepada siswa.

Materi yang diberikan meliputi dasar-dasar elektronika, programming dengan Arduino, dan assembly robot sederhana. Siswa antusias mengikuti setiap sesi dan berhasil membuat robot line follower sebagai project akhir.

"Workshop ini sangat bermanfaat untuk mengembangkan minat siswa pada bidang STEM (Science, Technology, Engineering, and Mathematics)," kata Pak Bambang, guru pembina Science Club.

Instruktur workshop adalah alumni SMP 54 yang sekarang berkuliah di Teknik Elektro ITS. Kolaborasi antara sekolah dan alumni ini diharapkan dapat terus berkelanjutan.

Ke depannya, Science Club merencanakan untuk mengikuti kompetisi robotika tingkat nasional. Dengan bekal dari workshop ini, diharapkan siswa dapat bersaing dengan sekolah-sekolah lainnya.',
                'user_id' => $admin->id,
                'status' => true,
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1)
            ]
        ];

        foreach ($beritas as $berita) {
            Berita::create($berita);
        }

        $this->command->info('Default data seeded successfully!');
    }
}