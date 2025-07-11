<?php
include('./model/db.php');

function read_all() {
    $koneksi = open_koneksi();
    $query = mysqli_query($koneksi, "select * from tbl_buku");
    $data_buku = mysqli_fetch_all($query,MYSQLI_ASSOC);
    return $data_buku;
}
function read_single($kode_buku){
    $koneksi = open_koneksi();

    $query = mysqli_query($koneksi, "select * from tbl_buku where kode_buku='$kode_buku'");
    $data = mysqli_fetch_array($query);
    return $data;
}

function save_new($kode_buku, $isbn, $judul, $pengarang, $tahun, $penerbit)
{
    $koneksi = open_koneksi();
    $query = mysqli_query($koneksi, "insert into tbl_buku(kode_buku, isbn, judul, pengarang, tahun, penerbit) values(
    '$kode_buku','$isbn','$judul','$pengarang','$tahun','$penerbit')");
    if($query){
        return true;
    }else{
        return false;
    }
}
function save_edit($kode_buku, $isbn, $judul, $pengarang, $tahun, $penerbit, $kodebuku_lama){
    $koneksi = open_koneksi();

    $query = mysqli_query($koneksi, "update tbl_buku set kode_buku='$kode_buku', 
    isbn='$isbn', judul='$judul', pengarang='$pengarang', tahun='$tahun', penerbit='$penerbit'
    where kode_buku='$kodebuku_lama'");
    if($query){
        return true;
    }else{
        return false;
    }
}

function delete($kode_buku){
    $koneksi = open_koneksi();

    $query = mysqli_query($koneksi, "delete from tbl_buku where kode_buku='$kode_buku'");
    if($query){
        return true;
    }else{
        return false;
    }
}
?>