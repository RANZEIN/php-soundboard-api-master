# MyInstants Soundboard PHP API

Proyek ini adalah API dan dashboard sederhana berbasis PHP untuk mengambil dan menampilkan soundboard dari situs [myinstants.com](https://www.myinstants.com). Anda dapat melihat, mencari, dan memutar sound trending langsung dari browser.

## Fitur
- Menampilkan soundboard trending
- Menampilkan soundboard terbaru
- Fitur pencarian soundboard
- Memutar sound langsung dari browser

## Struktur Folder
- `soundboard.php` : Dashboard utama (UI web)
- `trending.php`   : API trending soundboard (JSON)
- `recent.php`     : API soundboard terbaru (JSON)
- `search.php`     : API pencarian soundboard (JSON)
- `favorites.php`, `uploaded.php`, `best.php`, `detail.php` : API tambahan
- `simple_html_dom.php` : Library untuk parsing HTML

## Cara Menjalankan

### 1. Pastikan Sudah Terinstall
- PHP (minimal versi 7.4, direkomendasikan 8.x)
- Koneksi internet aktif (untuk mengambil data dari myinstants.com)

### 2. Jalankan Server PHP
Buka terminal, masuk ke folder project:
```sh
cd /Users/ranzein/Desktop/code/Soundboard-PHP-API-master
```
Jalankan server PHP built-in:
```sh
php -S localhost:8000
```

### 3. Akses Dashboard
Buka browser dan kunjungi:
```
http://localhost:8000/soundboard.php
```

### 4. Menggunakan Dashboard
- Pilih tab **Trending** untuk melihat soundboard trending.
- Klik tombol **play** pada sound untuk memutarnya.
- Gunakan tab **Recent** untuk sound terbaru.
- Gunakan tab **Search** untuk mencari soundboard.

## Catatan Penting
- Jika menggunakan PHP built-in server, **jangan akses API lokal via HTTP dari dalam PHP** (gunakan logic langsung seperti pada dashboard).
- Jika ingin mengembangkan lebih lanjut, refactor logic API ke dalam fungsi terpisah agar mudah digunakan di berbagai file.

## Lisensi
MIT
