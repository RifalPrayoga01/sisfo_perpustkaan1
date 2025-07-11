<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "db_perpustakaan");
define("DB_PORT", "3306");

// Tambahkan koneksi ke database:
$koneksi = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
