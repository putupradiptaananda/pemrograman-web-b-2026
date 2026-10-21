# Evaluasi Tengah Semester

## 1. Buat deskripsi dan ruang lingkup pekerjaan yang akan dibuat

LibraryReg, aplikasi pendaftaran perpustakaan berbasis web. Aplikasi ini menampilkan informasi dasa perpustakaan dan mengatur anggotanya.
Akan ada 3 halaman, yaitu landing page, formulir pendaftaran anggota, dan pengelolaan anggota. Pada formulir, terdapat validasi kolom wajib, format email. Pada pengelolaan anggota, terdapat fitur search, edit, dan hapus. Secara default, akan menampilkan data dalam bentuk tabel.

Pada bagian atas setiap halaman, akan ada menu navigasi yang mengarahkan pengguna ke setiap halaman. Menu navigasi akan ada penanda menu aktif. Seluruh situs dibuat responsif.

## 2. Buatk Rancangan Halaman dan Struktur Menu

- index.html/
  - Landing page
  - Menampilkan informasi layanan perpustakaan
  - Mengarahi pengguna ke halaman lainnya
- pendaftaran/
  - Formulir Pendaftaran Anggota
  - Menggantikan formulir kertas dengan digital
  - Memerlukan input data berikut:
    - Nama lengkap
    - NIM/NIP
    - Program studi
    - Alamat
    - Nomor telepon
    - Email
    - Jenis keanggotaan: mahasiswa, dosen, atau tenaga kependidikan
- anggota.html/
  - Pengelolaan Anggota
  - Menampilkan data anggota dalam bentuk tabel
  - Search berdasarkan nama atau NIM/NIP
  - Mengedit anggota

Navigation Menu:

- Beranda (index.html)
- Pendaftaran (/register/index.html)
- Pengelolaan Anggota (/anggota/index.html)

## 3. Desain UI Landing Page.

![Desain UI Landing Page](./readme-assets/Desktop%20-%201.png)
Warna biru sebagai tanda hero section.

## 4. Implementasikan dan publis web yang dibuat.

- [Source code](./)
- Link website: https://library-reg-two.vercel.app/
