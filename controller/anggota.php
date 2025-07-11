<?php
include("./model/modelanggota.php");

function index() {
    $data_anggota = read_all();
    include("./view/anggota/data_anggota.php");
}

function tambah() {
    include("./view/anggota/tambah_anggota.php");
}

function proses_tambah() {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];

    if(save_new($npm, $nama, $jurusan, $no_telp, $email)){
        $_SESSION["SUCCESS_SISTEM"] = "Anggota berhasil ditambah!";
    }else{
        $_SESSION["ERROR_SISTEM"] = "Proses gagal!";
    }

    include("./view/anggota/tambah_anggota.php");
}

function ubah() {
    $npm = $_GET['npm'];

    $data_anggota = read_single($npm);

    include("./view/anggota/ubah_anggota.php");
}

function proses_ubah() {
    $npm_lama = $_POST['npm_lama'];
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];

    if(save_edit($npm, $nama, $jurusan, $no_telp, $email, $npm_lama)){
        $_SESSION["SUCCESS_SISTEM"] = "Anggota berhasil diubah!";
        $data_anggota = read_single($npm);
    }else{
        $_SESSION["ERROR_SISTEM"] = "Proses gagal!";
        $data_anggota = read_single($npm_lama);
    }
    
    include("./view/anggota/ubah_anggota.php");
}

function proses_hapus() {
    $npm = $_GET['npm'];

    if(delete($npm)){
        $_SESSION["SUCCESS_SISTEM"] = "Anggota berhasil dihapus!";
    }else{
        $_SESSION["ERROR_SISTEM"] = "Proses gagal!";
    }
    
    index();
}
?>