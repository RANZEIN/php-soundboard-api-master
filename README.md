<p align="center">
  <img src="https://www.myinstants.com/media/apple-touch-icon-114x114.png" width="100" alt="MyInstants Logo">
</p>

<h1 align="center">🎵 MyInstants Soundboard PHP API & Dashboard 🎵</h1>

<p align="center">
  <a href="#fitur">✨ Fitur</a> •
  <a href="#cara-menjalankan">🚀 Cara Menjalankan</a> •
  <a href="#struktur-folder">📁 Struktur Folder</a> •
  <a href="#catatan-penting">⚠️ Catatan</a> •
  <a href="#lisensi">📝 Lisensi</a>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-%3E=7.4-blue?logo=php" alt="PHP Version">
  <img src="https://img.shields.io/badge/License-MIT-green" alt="MIT License">
  <img src="https://img.shields.io/badge/Status-Active-brightgreen" alt="Status">
</p>

---

## 📖 Deskripsi

Proyek ini adalah API dan dashboard web berbasis PHP untuk menampilkan, mencari, dan memutar soundboard trending dari [myinstants.com](https://www.myinstants.com) secara langsung di browser Anda.

---

## ✨ Fitur
- 🔥 Menampilkan soundboard **Trending**
- 🆕 Menampilkan soundboard **Terbaru**
- 🔍 **Pencarian** soundboard
- ▶️ **Memutar** sound langsung di browser
- 🎨 Tampilan dashboard modern & responsif

---

## 🚀 Cara Menjalankan

### 1. **Persiapan**
- Pastikan sudah terinstall **PHP** (minimal versi 7.4, direkomendasikan 8.x)
- Koneksi internet aktif (untuk mengambil data dari myinstants.com)

### 2. **Jalankan Server PHP**
Buka terminal, lalu jalankan:
```sh
cd /Users/ranzein/Desktop/code/Soundboard-PHP-API-master
php -S localhost:8000
```

### 3. **Akses Dashboard**
Buka browser dan kunjungi:
```
http://localhost:8000/soundboard.php
```

### 4. **Menggunakan Dashboard**
- Pilih tab **Trending** untuk melihat soundboard trending
- Klik tombol **play** (▶️) untuk memutar sound
- Gunakan tab **Recent** untuk sound terbaru
- Gunakan tab **Search** untuk mencari soundboard

---

## 📁 Struktur Folder
```
Soundboard-PHP-API-master/
├── soundboard.php         # Dashboard utama (UI web)
├── trending.php           # API trending soundboard (JSON)
├── recent.php             # API soundboard terbaru (JSON)
├── search.php             # API pencarian soundboard (JSON)
├── favorites.php          # API sound favorit user
├── uploaded.php           # API sound yang di-upload user
├── best.php               # API best of all time
├── detail.php             # API detail sound
├── simple_html_dom.php    # Library parsing HTML
├── README.md              # Dokumentasi
└── LICENSE                # Lisensi
```

---

## ⚠️ Catatan Penting
- Jika menggunakan PHP built-in server, **jangan akses API lokal via HTTP dari dalam PHP** (gunakan logic langsung seperti pada dashboard).
- Untuk pengembangan lebih lanjut, refactor logic API ke dalam fungsi terpisah agar mudah digunakan di berbagai file.

---

## 📝 Lisensi

Proyek ini berlisensi **MIT**. Silakan gunakan, modifikasi, dan distribusikan sesuai kebutuhan Anda.

---

<p align="center">
  <b>Selamat menikmati soundboard favorit Anda! 🎶</b>
</p>
