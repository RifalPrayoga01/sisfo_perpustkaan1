<?php
include("./model/modelbuku.php");

function index(){
    $data_buku = read_all();
    include('./view/buku/data_buku.php');
}

function tambah() {
    include('./view/buku/tambah_buku.php');
}

function proses_tambah() {
    $kode_buku = $_POST['kode_buku'];
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tahun = $_POST['tahun'];
    $penerbit = $_POST['penerbit'];

    $status = save_new($kode_buku, $isbn, $judul, $pengarang, $tahun, $penerbit);
    if($status == true){
        $_SESSION['SUCCESS_SISTEM'] = 'Buku berhasil di tambah';
    }else{
        $_SESSION['SUCCESS_SISTEM'] = 'Operasi gagal';
    }

    include('./view/buku/tambah_buku.php');
}
function ubah() {
    $kode_buku = $_GET['kode'];

    $data_buku = read_single($kode_buku);

    include("./view/buku/ubah_buku.php");
}

function proses_ubah() {
    $kodebuku_lama = $_POST['kodebuku_lama'];
    $kode_buku = $_POST['kode_buku'];
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tahun = $_POST['tahun'];
    $penerbit = $_POST['penerbit'];

    if(save_edit($kode_buku, $isbn, $judul, $pengarang, $tahun, $penerbit, $kodebuku_lama)){
        $_SESSION["SUCCESS_SISTEM"] = "Data Buku berhasil diubah!";
        $data_buku = read_single($kode_buku);
    }else{
        $_SESSION["ERROR_SISTEM"] = "Proses gagal!";
        $data_buku = read_single($kodebuku_lama);
    }
    
    include("./view/buku/ubah_buku.php");
}
function proses_hapus() {
    $kode_buku = $_GET['kode'];

    if(delete($kode_buku)){
        $_SESSION["SUCCESS_SISTEM"] = "Data Buku berhasil dihapus!";
    }else{
        $_SESSION["ERROR_SISTEM"] = "Proses gagal!";
    }
    
    index();
}
?>