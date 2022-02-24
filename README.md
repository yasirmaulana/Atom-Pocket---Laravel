## Atom Pocket

Sebuah aplikasi yang dapat melakukan pencatatan keuangan sederhana, yang dimana dapat mencatat semua uang masuk dan keluar. Kemudian si pemilik dapat melihat semua history transaksi di laporan yang sudah di sediakan.

Menu di atom pocket

**Master**
- Dompet
- Kategori

**Transaksi**
- Dompet Masuk
- Dompet Keluar

**Laporan**
- Laporan Transaksi


## Persiapan dan Install Aplikasi Atom Pocket

- Download source dari repository
- Buatlah database di MySQL dengan nama 'laravel_atompocket'
- Import file laravel_atompocket.sql
- Rename file .env.example menjadi .env
- Sesuaikan parameter berikut pada file .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_atompocket
DB_USERNAME=root
DB_PASSWORD=password

- Jalankan projek Atom Pocket dari terminal dan ketikan perintah 'composer install --ignore-platform-reqs' untuk menginstal folder vendor (pastikan di komputer sudah terinstal composer)

- Jika proses download folder vender sudah selesah, ketikan perintah 'php artisan serve' untuk menjalankan projek