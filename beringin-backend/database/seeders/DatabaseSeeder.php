<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Laporan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database for Beringin Smart (Anis Aristi Edition).
     */
    public function run(): void
    {
        // 1. Akun Petugas Sarpras
        $petugas = User::updateOrCreate(
            ['email' => 'petugas@beringin.sch.id'],
            [
                'name'     => 'Pak Syahrul (Petugas Sarpras)',
                'password' => Hash::make('password123'),
                'role'     => 'petugas',
            ]
        );

        // 2. Akun Siswa (Anis Aristi)
        $siswa = User::updateOrCreate(
            ['email' => 'anis@beringin.sch.id'],
            [
                'name'     => 'Anis Aristi (XI PPLG 1)',
                'password' => Hash::make('password123'),
                'role'     => 'siswa',
            ]
        );

        // Siswa Pendukung (Opsional untuk testing multi-siswa)
        $siswaPendukung = User::updateOrCreate(
            ['email' => 'siswa@beringin.sch.id'],
            [
                'name'     => 'Farhan Maulana (XI PPLG 2)',
                'password' => Hash::make('password123'),
                'role'     => 'siswa',
            ]
        );

        // 3. Data Awal Laporan Pengaduan Sarpras
        Laporan::updateOrCreate(
            ['lokasi' => 'Studio Podcast & Animasi'],
            [
                'user_id'   => $siswa->id,
                'nama'      => $siswa->name,
                'kategori'  => 'Laboratorium',
                'deskripsi' => 'Mixer audio saluran 3 berdengung keras dan lampu ring light meja rekaman tidak menyala.',
                'status'    => 'Menunggu',
            ]
        );

        Laporan::updateOrCreate(
            ['lokasi' => 'Ruang UKS & Fasilitas Kesehatan'],
            [
                'user_id'   => $siswa->id,
                'nama'      => $siswa->name,
                'kategori'  => 'Fasilitas Kelas',
                'deskripsi' => 'Kran wastafel cuci tangan patah dan exhaust fan toilet UKS mati.',
                'status'    => 'Sedang Diproses',
            ]
        );

        Laporan::updateOrCreate(
            ['lokasi' => 'Kantin Sekolah & Gazebo Belakang'],
            [
                'user_id'   => $siswaPendukung->id,
                'nama'      => $siswaPendukung->name,
                'kategori'  => 'Lingkungan/Taman',
                'deskripsi' => 'Stopkontak area gazebo outdoor terkena rembesan air hujan dan talang air bocor.',
                'status'    => 'Selesai',
            ]
        );
    }
}
