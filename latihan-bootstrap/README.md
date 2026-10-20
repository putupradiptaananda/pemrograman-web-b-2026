# Tugas 5 - Latihan Bootstrap

## Deskripsi, fitur/menu

Latihan ini merupakan website sederhana yang dibuat menggunakan Bootstrap 5.2.3. Website terdiri dari halaman login, registrasi, dan halaman konten utama yang menerapkan komponen Bootstrap serta layout responsive.

- Halaman login
  - Input email dan password
  - Opsi mengingat password
  - Link lupa password
  - Link menuju halaman registrasi
- Halaman registrasi
  - Input username, email, password, dan konfirmasi password
  - Persetujuan terms and conditions
  - Tombol registrasi
- Halaman konten
  - Header dan navigasi
  - Sidebar berisi tiga card
  - Konten utama dengan tiga card
  - Tombol Read More
  - Footer dengan link informasi
  - Pengaturan urutan layout menggunakan utility `order` pada tampilan mobile dan desktop

## Sumber referensi/web asli

- [Laman Login](https://startbootstrap.com/snippets/sign-in-split)
- [Laman Registrasi](https://bootsnipp.com/snippets/21jx)
- [Laman Konten](https://smadt.net/pweb1/boot1b.html)

## Screenshot

### 1. Halaman login - desktop

![](./readme-assets/Screenshot%202026-10-20%20203716.png)

### 2. Halaman login - mobile

![](./readme-assets/Screenshot%202026-10-20%20203733.png)

### 3. Halaman registrasi - desktop

![](./readme-assets/Screenshot%202026-10-20%20203807.png)

### 4. Halaman registrasi - mobile

![](./readme-assets/Screenshot%202026-10-20%20204517.png)

### 5. Halaman konten - desktop

![](./readme-assets/Screenshot%202026-10-20%20203836.png)

### 6. Halaman konten - mobile

![](./readme-assets/Screenshot%202026-10-20%20203844.png)

## Wireframe

- Wireframe tidak dibuat secara terpisah. Layout halaman dirancang langsung menggunakan komponen dan utility Bootstrap.

## Desain UI

| Elemen Desain        | Detail                                                                                                                                                                   |
| -------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| Framework            | Bootstrap 5.2.3 melalui jsDelivr CDN.                                                                                                                                    |
| Tema warna           | Tema terang dengan aksen biru dan area konten berwarna gelap.                                                                                                            |
| Warna aksen          | `#0d6efd` sebagai warna utama Bootstrap untuk header, tombol, dan link.                                                                                                  |
| Warna latar belakang | `#f8f9fa` untuk halaman login, registrasi, dan area konten utama.                                                                                                        |
| Warna permukaan      | Putih untuk form dan card sidebar.                                                                                                                                       |
| Warna konten         | `#212529` untuk card konten utama dan footer.                                                                                                                            |
| Tipografi            | Tipografi bawaan Bootstrap dengan judul yang dibuat lebih tebal pada halaman konten.                                                                                     |
| Tata letak           | Menggunakan Bootstrap Grid dengan pembagian sidebar dan konten utama.                                                                                                    |
| Responsivitas        | Layout berubah menjadi satu kolom pada layar kecil menggunakan breakpoint `md`.                                                                                          |
| Urutan layout        | Sidebar tampil sebelum konten pada mobile, lalu berpindah ke sisi kiri pada layar `md` dan lebih besar menggunakan `order-1`, `order-2`, `order-md-1`, dan `order-md-2`. |
| Komponen utama       | Navbar sederhana, form, input, checkbox, card, tombol, link, dan footer.                                                                                                 |

## Source Code

- [Source Code](./)

## Alaman URL Website

- https://latihan-bootstrap-amber.vercel.app/
