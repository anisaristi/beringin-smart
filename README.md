# 🔮 Beringin Smart — Fullstack App (Ionic React + Laravel API)

> **Sistem Informasi Layanan & Pengaduan Sarana Prasarana Sekolah**  
> *SMK Negeri 1 Beringin • Kompetensi Keahlian Pengembangan Perangkat Lunak dan Gim (PPLG)*  
> Disusun oleh: **Anis Aristi** ([@anisaristi](https://github.com/anisaristi))

[![Ionic React](https://img.shields.io/badge/Frontend-Ionic%20React%20%2B%20TypeScript-7c3aed?style=for-the-badge&logo=ionic)](https://ionicframework.com/)
[![Laravel Sanctum](https://img.shields.io/badge/Backend-Laravel%2012%20REST%20API-6d28d9?style=for-the-badge&logo=laravel)](https://laravel.com/)
[![Database MySQL](https://img.shields.io/badge/Database-MySQL%20Laragon-a78bfa?style=for-the-badge&logo=mysql)](https://www.mysql.com/)
[![SKKNI 282/2016](https://img.shields.io/badge/Standard-SKKNI%20No.%20282%2F2016-4c1d95?style=for-the-badge)](https://kemnaker.go.id/)

---

## 📌 Ringkasan Proyek

**Beringin Smart** merupakan aplikasi multi-platform (Web & Mobile PWA) yang dirancang untuk memfasilitasi pelaporan kendala sarana dan prasarana di lingkungan SMKN 1 Beringin secara transparan, akurat, dan cepat. Aplikasi ini mengintegrasikan antarmuka modern berbasis **Ionic React TypeScript (Royal Violet & Electric Amethyst Edition)** dengan backend **Laravel 12 REST API** yang diproteksi autentikasi token **Laravel Sanctum** serta terhubung ke database **MySQL Laragon**.

### ⚡ Fitur Utama
1. **Autentikasi & Otorisasi Berbasis Peran (Role-Based Access Control):**
   - **Siswa (Anis Aristi):** Mengajukan laporan sarana, memantau riwayat & status penanganan secara real-time.
   - **Petugas Sarpras:** Memantau seluruh tiket masuk dari semua siswa dan memverifikasi penanganan (mengubah status menjadi *Selesai*).
2. **Desain Mobile-First & Responsif (Royal Violet & Electric Amethyst):**
   - Menggunakan tipografi modern *Outfit & Plus Jakarta Sans* dengan palet warna *Royal Violet, Electric Amethyst, dan Radiant Amber*.
   - Navigasi segment pill yang ramah sentuhan (touch-friendly) untuk perangkat smartphone.
   - Kolom split 2-arah otomatis untuk tampilan desktop layar lebar.
3. **Pencarian & Filter Cepat (Instant Filtering):**
   - Pencarian real-time berdasarkan ruangan, nama pelapor, atau rincian kerusakan.
   - Filter cepat berdasarkan kategori fasilitas (*Fasilitas Kelas*, *Laboratorium*, *Lingkungan/Taman*).

---

## 🏗️ Arsitektur Sistem

```mermaid
graph TD
    Client[📱 Frontend Ionic React] -->|HTTP Bearer Token| Gateway[🚪 Laravel API Gateway]
    Gateway --> Auth[🛡️ Sanctum Auth Middleware]
    Gateway --> CORS[⚙️ CORS Handler]
    Auth --> Controller[📋 Laporan Controller]
    Controller --> Policy{🔒 Role Check}
    Policy -->|Role: Siswa| ReadWrite[Buat & Lihat Tiket]
    Policy -->|Role: Petugas| Approve[Verifikasi & Selesaikan Tiket]
    ReadWrite --> DB[(🗄️ Database MySQL Laragon)]
    Approve --> DB
```

---

## 🛠️ Petunjuk Instalasi & Menjalankan

### Persyaratan Lingkungan
- **Node.js**: v18.0.0 atau lebih baru
- **PHP**: v8.2 atau lebih baru
- **Composer**: v2.5 atau lebih baru
- **MySQL**: Laragon / XAMPP (Port 3306)

---

### Langkah 1: Konfigurasi Backend (`beringin-backend`)

1. Pindah ke direktori backend:
   ```bash
   cd beringin-backend
   ```
2. Salin environment file dan generate key (jika baru di-clone):
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
3. Lakukan migrasi database dan generate data awal (seeder):
   ```bash
   php artisan migrate:fresh --seed
   ```
4. Jalankan server API backend:
   ```bash
   php artisan serve
   ```
   *Base URL API:* http://localhost:8000/api

---

### Langkah 2: Konfigurasi Frontend (`Beringin-Smart`)

1. Buka terminal baru dan masuk ke folder frontend:
   ```bash
   cd Beringin-Smart
   ```
2. Pasang dependensi paket:
   ```bash
   npm install
   ```
3. Mulai development server:
   ```bash
   npm run dev
   ```
   *Aplikasi terbuka di:* http://localhost:5173 atau http://localhost:8100

---

## 🔑 Kredensial Pengguna (Data Bawaan Seeder)

| Hak Akses | Alamat Email | Kata Sandi | Wewenang Sistem |
| :--- | :--- | :--- | :--- |
| **Petugas Sarpras** | `petugas@beringin.sch.id` *(Pak Syahrul)* | `password123` | Akses verifikasi penuh & penutupan tiket selesai |
| **Siswa (Anis Aristi)** | `anis@beringin.sch.id` *(Anis Aristi - XI PPLG 1)* | `password123` | Input laporan sarana & pelacakan status penanganan |
| **Siswa (Umum)** | `siswa@beringin.sch.id` *(Farhan Maulana - XI PPLG 2)* | `password123` | Input laporan sarana umum |

---

## 🛡️ Standar Keamanan & Validasi (SKKNI 282/2016)

- **Sanctum Authentication**: Akses setiap endpoint dilindungi via header `Authorization: Bearer <TOKEN>`.
- **Role Guard Server-Side**: Proteksi tingkat server pada `PATCH /api/laporan/{id}/status` mengembalikan respon **403 Forbidden** apabila siswa mencoba memperbarui status tiket.
- **Client Route Protection**: Token diperiksa secara otomatis pada mount halaman; sesi yang belum terautentikasi otomatis diarahkan ke formulir masuk.

---

## 📸 Dokumentasi Tangkapan Layar (Screenshots)

Berikut adalah dokumentasi tangkapan layar antarmuka pengguna (Frontend), layanan antarmuka backend (REST API), serta bukti pengujian sistem dan validasi keamanan pada proyek **Anis Aristi**.

### 1. Antarmuka Frontend (User Interface)

| Tampilan Halaman Login | Dashboard Siswa & Statistik |
| :---: | :---: |
| ![Halaman Login](screenshots/01_login_page.png) | ![Dashboard Siswa](screenshots/03_uji_login_siswa_sukses.png) |
| *Antarmuka login modern dengan aksen Royal Violet.* | *Dashboard siswa dengan ringkasan status tiket sarpras.* |

| Formulir Input Pengaduan Sarpras | Filter Kategori Fasilitas |
| :---: | :---: |
| ![Form Pengaduan](screenshots/04_form_input_pengaduan_sarpras.png) | ![Filter Kategori](screenshots/07_dashboard_siswa_kategori.png) |
| *Formulir input tiket kendala sarpras yang interaktif.* | *Filter live kategori Fasilitas Kelas, Lab, dan Lingkungan.* |

| Dashboard Petugas Sarpras | Rincian Tiket & Aksi Petugas |
| :---: | :---: |
| ![Dashboard Petugas](screenshots/08_uji_login_petugas_sukses.png) | ![Detail Tiket Petugas](screenshots/09_detail_laporan_petugas_aksi.png) |
| *Panel pemantauan seluruh tiket pengaduan sarana sekolah.* | *Tombol otoritas verifikasi status 'Tandai Penanganan Selesai'.* |

| Tampilan Detail Siswa (Read-Only) | Tampilan Mobile Responsif (PWA) |
| :---: | :---: |
| ![Detail Tiket Siswa](screenshots/06_detail_laporan_siswa_readonly.png) | ![Tampilan Mobile](screenshots/11_tampilan_mobile_responsive.png) |
| *Antarmuka terlindungi (read-only) untuk hak akses siswa.* | *Layout responsif touch-friendly pada perangkat smartphone.* |

---

### 2. Matriks Hasil Pengujian Sistem & Validasi Keamanan (SKKNI No. 282/2016)

| No | Komponen Uji | Skenario Pengujian | Hasil yang Diharapkan | Hasil Aktual | Status | Bukti Screenshot |
| :---: | :--- | :--- | :--- | :--- | :---: | :---: |
| **1** | **Validasi Form Login** | Memasukkan kredensial login keliru/salah. | Sistem menolak dengan HTTP 401 dan memunculkan toast error. | Menampilkan toast peringatan login tidak valid. | **PASS (100%)** | [Lihat](screenshots/02_uji_validasi_login_gagal.png) |
| **2** | **Akses Login Siswa** | Login sebagai Siswa (anis@beringin.sch.id). | Mendapatkan token Sanctum, role siswa, masuk ke Beranda Siswa. | Berhasil login dan menampilkan dashboard akun siswa. | **PASS (100%)** | [Lihat](screenshots/03_uji_login_siswa_sukses.png) |
| **3** | **Akses Login Petugas** | Login sebagai Petugas (petugas@beringin.sch.id). | Mendapatkan token Sanctum, role petugas, masuk ke Beranda Petugas. | Berhasil login dengan kontrol otoritas verifikasi status. | **PASS (100%)** | [Lihat](screenshots/08_uji_login_petugas_sukses.png) |
| **4** | **CRUD - Create Laporan** | Siswa mengirim laporan kerusakan fasilitas baru. | Form tervalidasi, data tersimpan (HTTP 201), dan tampil di daftar laporan. | Laporan berhasil ditambahkan dengan status awal *"Menunggu"*. | **PASS (100%)** | [Lihat](screenshots/05_uji_crud_create_berhasil.png) |
| **5** | **CRUD - Read & Detail** | Pengguna membuka detail laporan kendala sarpras. | Seluruh detail kendala, lokasi, dan tanggal masuk tampil akurat. | Detail laporan terbuka dengan status penanganan real-time. | **PASS (100%)** | [Lihat](screenshots/06_detail_laporan_siswa_readonly.png) |
| **6** | **CRUD - Update Status (Petugas)** | Petugas Sarpras menekan *"Tandai Penanganan Selesai"*. | Status tiket diupdate menjadi *"Selesai"* (HTTP 200) dengan badge hijau. | Status tiket berhasil diperbarui menjadi *"Selesai Ditangani"*. | **PASS (100%)** | [Lihat](screenshots/10_uji_crud_update_status_selesai.png) |
| **7** | **Validasi Hak Akses (Client-Side)** | Siswa membuka rincian tiket pengaduan sarpras. | Tombol ubah status tidak tampil untuk pengguna role siswa. | Tombol disembunyikan; siswa hanya dapat membaca status. | **PASS (100%)** | [Lihat](screenshots/06_detail_laporan_siswa_readonly.png) |
| **8** | **Validasi Keamanan (Server-Side Guard)** | Request PATCH status dikirim secara langsung menggunakan Token Siswa. | Backend menolak request dan mengembalikan status **HTTP 403 Forbidden**. | Server merespon: *"Akses ditolak (403 Forbidden)..."*. Database aman. | **PASS (100%)** | Terverifikasi (HTTP 403) |

---

*© SMK Negeri 1 Beringin • Modul UKK / LKPU PPLG.*
