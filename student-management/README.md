# Tugas ke 4 - Student Management

## Sumber referensi/web asli
- https://sman4dps.sch.id/

## Deskripsi, fitur/menu

- Form penambahan mahasiswa
    - Menerima:
        - NIM
        - Nama Lengkap
        - Jurusan
        - Email
    - Fitur simpan, batal, dan reset
- Daftar Mahasiswa berupa tabel
    - Fitur search
    - Menampilkan:
        - No
        - NIM
        - Nama
        - Jurusan
        - Email
        - Aksi: Edit dan hapus
    - Pagination

## Screenshot
![](./readme-assets/Screenshot%202026-10-12%20210349.png)
## Wireframe
![](./readme-assets/Student%20Management%20wireframe.png)

## Desain UI

| Elemen Desain | Detail |
|---|---|
| Tema warna | Dark mode dengan latar belakang biru-hitam dan komponen berwarna abu-abu gelap. |
| Warna latar belakang | ![#141b21](https://img.shields.io/badge/-%23141b21-141b21?style=flat-square) `#141b21` untuk halaman dan navbar. |
| Warna permukaan | ![#26252d](https://img.shields.io/badge/-%2326252d-26252d?style=flat-square) `#26252d` untuk card, input, dan tombol. |
| Warna teks | ![#8b97ad](https://img.shields.io/badge/-%238b97ad-8b97ad?style=flat-square) `#8b97ad` untuk teks utama, dengan warna putih untuk judul navbar dan teks tombol hapus. |
| Warna aksen | ![#cf3030](https://img.shields.io/badge/-%23cf3030-cf3030?style=flat-square) `#cf3030` sebagai aksen merah untuk label, hover, dan interaksi utama. |
| Warna bahaya | ![#f52f3d](https://img.shields.io/badge/-%23f52f3d-f52f3d?style=flat-square) `#f52f3d` untuk tombol reset dan aksi hapus. |
| Warna border | ![#55627e](https://img.shields.io/badge/-%2355627e-55627e?style=flat-square) `#55627e` untuk garis pemisah navbar, card, input, tombol, dan tabel. |
| Font | `DM Sans` untuk teks umum dan `Oswald` untuk judul navbar serta judul card. |
| Tata letak | Menggunakan grid dua kolom: form mahasiswa di sebelah kiri dan daftar mahasiswa di sebelah kanan. |
| Komponen utama | Card untuk form dan tabel, input/select untuk data mahasiswa, tombol aksi, fitur pencarian, dan pagination. |
| Bentuk komponen | Sudut komponen hampir kotak dengan `border-radius: 1px` agar sesuai dengan situs referensi. |
| Responsivitas | Lebar container dibatasi hingga `1150px` dan menyesuaikan ukuran layar menggunakan CSS `min()` dan `calc()`. |
| Ikon aksi | Menggunakan ikon pensil untuk edit dan ikon tempat sampah untuk hapus pada tabel mahasiswa. |

## Source Code
- [Source Code](./)

## Alaman URL Website
- https://student-management-azure-alpha.vercel.app/
