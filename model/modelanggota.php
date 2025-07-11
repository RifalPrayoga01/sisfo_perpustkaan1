<?php
include("db.php");

function read_all(){
    $koneksi = open_koneksi();

    $query = mysqli_query($koneksi, "select * from tbl_anggota");
    $data = mysqli_fetch_all($query,MYSQLI_ASSOC);
    return $data;
}

function read_single($npm){
    $koneksi = open_koneksi();

    $query = mysqli_query($koneksi, "select * from tbl_anggota where npm='$npm'");
    $data = mysqli_fetch_array($query);
    return $data;
}

function save_new($npm, $nama, $jurusan, $no_telp, $email){
    $koneksi = open_koneksi();

    $query = mysqli_query($koneksi, "insert into tbl_anggota (npm, nama, jurusan, no_telp, email)
    values('$npm', '$nama', '$jurusan', '$no_telp', '$email')");
    if($query){
        return true;
    }else{
        return false;
    }
}

function save_edit($npm, $nama, $jurusan, $no_telp, $email, $npm_lama){
    $koneksi = open_koneksi();

    $query = mysqli_query($koneksi, "update tbl_anggota set npm='$npm', 
    nama='$nama', jurusan='$jurusan', no_telp='$no_telp', email='$email'
    where npm='$npm_lama'");
    if($query){
        return true;
    }else{
        return false;
    }
}

function delete($npm){
    $koneksi = open_koneksi();

    $query = mysqli_query($koneksi, "delete from tbl_anggota where npm='$npm'");
    if($query){
        return true;
    }else{
        return false;
    }
}
?>