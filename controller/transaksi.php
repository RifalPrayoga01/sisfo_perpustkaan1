<?php
include("model/transaksi.php");

function peminjaman() {
    $data = getDaftarPeminjaman();
    include("view/transaksi/peminjaman.php");
}

function proses_pinjam() {
    $npm = $_POST['npm'];
    $kode_buku = $_POST['kode_buku'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $deadline = $_POST['deadline'];

    tambahPeminjaman($npm, $kode_buku, $tgl_pinjam, $deadline);
    header("Location: index.php?modul=transaksi&proses=peminjaman");
}

function pengembalian() {
    $belumKembali = getBelumKembali(); 
    $riwayat = getRiwayatPengembalian(); 
    include("view/transaksi/pengembalian.php");
}

function proses_kembali() {
    $id_pinjam = $_POST['id_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];

    if (kembalikanBuku($id_pinjam, $tgl_kembali)) {
        $_SESSION["SUCCESS_SISTEM"] = "Buku berhasil dikembalikan.";
    } else {
        $_SESSION["ERROR_SISTEM"] = "Gagal mengembalikan buku.";
    }

    header("Location: index.php?modul=transaksi&proses=pengembalian");
}
