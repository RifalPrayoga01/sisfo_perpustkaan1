<?php
function getDaftarPeminjaman() {
    global $koneksi;
    $sql = "SELECT * FROM tbl_pinjam ORDER BY tgl_pinjam ASC";
    return mysqli_query($koneksi, $sql);
}

function tambahPeminjaman($npm, $kode_buku, $tgl_pinjam, $deadline) {
    global $koneksi;
    $sql = "INSERT INTO tbl_pinjam (npm, kode_buku, tgl_pinjam, deadline)
            VALUES ('$npm', '$kode_buku', '$tgl_pinjam', '$deadline')";
    return mysqli_query($koneksi, $sql);
}

function getBelumKembali() {
    global $koneksi;
    $sql = "SELECT p.* FROM tbl_pinjam p
            LEFT JOIN tbl_kembali k ON p.id_pinjam = k.id_pinjam
            WHERE k.id_kembali IS NULL
            ORDER BY p.tgl_pinjam ASC";
    return mysqli_query($koneksi, $sql);
}

function hitungDenda($deadline, $tgl_kembali, $tarif = 1000) {
    $selisih = (strtotime($tgl_kembali) - strtotime($deadline)) / (60 * 60 * 24);
    return ($selisih > 0) ? $selisih * $tarif : 0;
}

function kembalikanBuku($id_pinjam, $tgl_kembali) {
    global $koneksi;

    $pinjam = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT deadline FROM tbl_pinjam WHERE id_pinjam = '$id_pinjam'"));
    $denda = hitungDenda($pinjam['deadline'], $tgl_kembali);

    $sql = "INSERT INTO tbl_kembali (id_pinjam, tgl_kembali, denda)
            VALUES ('$id_pinjam', '$tgl_kembali', '$denda')";
    return mysqli_query($koneksi, $sql);
}
function getRiwayatPengembalian() {
    global $koneksi;
    $sql = "SELECT k.*, p.npm, p.kode_buku, p.tgl_pinjam, p.deadline
            FROM tbl_kembali k
            JOIN tbl_pinjam p ON k.id_pinjam = p.id_pinjam
            ORDER BY k.tgl_kembali DESC";
    return mysqli_query($koneksi, $sql);
}

