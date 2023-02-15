<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@gmail.com',
            'name' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        DB::table('contacts')->insert([
            'email' => 'bima@gmail.com',
            'no_telp' => '0812 8480 6559',
            'address' => 'Ruko Green valley Soho Blok A2 No.1 Kel. Sukamantri Kec. Tamansari Kab.Bogor - Jawa Barat',
            'web' => 'bima.com',
        ]);

        DB::table('services')->insert(
            [
                'title' => "B'LABS",
                'image' => '-',
                'desc' => "B'Labs adalah istilah yang kami sebut untuk Layanan Laboratorium baik Kalibrasi maupun Pengujian, dengan kompetensi Lab Penguji dan Kalibrasi sesuai dengan KAN ISO 17025. B'Labs dapat membantu memberikan solusi untuk semua kebutuhan Pengujian dan kalibrasi.",
            ],
            [
                'title' => "B'TECH",
                'image' => '-',
                'desc' => "B.Tech in EEE adalah program UG empat tahun yang dirancang untuk meningkatkan keterampilan dan pengetahuan para insinyur yang antusias.",
            ],
            [
                'title' => "B'CERT",
                'image' => '-',
                'desc' => "B-Cert adalah portal yang memungkinkan pengguna untuk mengesahkan semua jenis dokumen pesan di Blockchain Bitcoin atau Ethereum, dengan memperoleh digital unik.",
            ]
        );

        DB::table('testimonis')->insert([
            'title' => 'Yoga Pratama',
            'position' => 'CEO',
            'desc' => 'Rukonya Bagus',
        ]);
    }
}
