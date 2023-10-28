<p align="center">
  <img src="./public/assets/img/TEKNO-KLOP.png" alt="LOGO" style="width: 250px;"/>
  <br/>
  <sub>SURAT | TEKNO KLOP INDONESIA</sub>
</p>

### Read Before Proceeding

Surat merupakan sebuah aplikasi yang dibuat untuk mempermudah PT. TEKNO KLOP INDONESIA dalam mengelola surat masuk dan surat keluar. Aplikasi ini dibuat dengan menggunakan framework **Laravel v10**. Untuk database yang digunakan adalah mysql.

Aplikasi dikembangkan oleh mahasiswa Politeknik Negeri Malang yang sedang menjalani magang di PT. TEKNO KLOP INDONESIA. Aplikasi ini dibuat untuk memenuhi tugas akhir magang.

Untuk cara instalasi aplikasi ini, silahkan baca dokumentasi dibawah ini.


## Table of Contents

- [Table of Contents](#table-of-contents)
- [Requirements](#requirements)
- [Installation](#installation)



## Requirements

- [PHP](https://www.php.net/) >= 8.1
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/en/) >= 20.0
- [NPM](https://www.npmjs.com/) >= 8.0

all in one installer [XAMPP](https://www.apachefriends.org/download.html)

## Installation

1. Clone the repository

```bash
git clone https://github.com/renaldi-oss/persuratan.git
```

2. cd into the project directory

```bash
cd persuratan
```

3. copy .env.example to .env

```bash
cp .env.example .env
```

4. set the database configuration in .env file

5. install composer dependencies

```bash
composer install
```

6. install npm dependencies

```bash
npm install
```

7. generate application key

```bash
php artisan key:generate
```

8. run the migration & seeder

```bash
php artisan migrate:fresh --seed
```

9. run the application on localhost

```bash
php artisan serve
```

10. run vite dev server

```bash
npm run dev
```

## Todo

| Nama fitur               | status            |
|--------------------------|------------------|
| Authentikasi User        | ✔️ _mari paleng_ |
| Surat PO   | ❌               |
| Surat WO   | ❌               |

## FAQ

1. **Instalasi Gagal**

check requirements diatas, kemudian coba lagi sampai berhasil :)

> **Note:** Jika masih belum berhasil, silahkan buat issue baru di repository ini. ketika membuat issue baru hubungi @renaldi-oss untuk meminta bantuan. dan jangan lupa kopinya :D


## Show your support

* Follow me on GitHub [@renaldi-oss](https://github.com/renaldi-oss) or my site [here](https://renaldi.tech)

## Disclaimer

project ini dikembangkan oleh rekan-rekan mahasiswa Politeknik Negeri Malang yang sedang menjalani magang di PT. TEKNO KLOP INDONESIA. Aplikasi ini dibuat untuk memenuhi tugas akhir magang. Aplikasi ini tidak untuk diperjual belikan. Jika ada yang menjual aplikasi ini, maka itu adalah penipuan. Terima kasih.