<?php
include("db.php");

function cek_login($username, $password){
    $koneksi = open_koneksi();

    $query = mysqli_query($koneksi, "select * from tbl_admin where `username`='$username' and `password`='$password'");
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_array($query);
        $id = $row['id_admin'];
        return $id;
    }else{
        return null;
    }
}
?>