<?php
function open_koneksi(){
    $koneksi = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);

    if(!$koneksi){
        return false;
    }else{
        return $koneksi;
    }
}
?>