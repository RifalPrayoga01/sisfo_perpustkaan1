<?php
include("./model/user.php");

function login(){
    include("./view/auth/login.php");
}

function vlogin(){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $id = cek_login($username, $password);
    if(!is_null($id)){
        $_SESSION["SUDAH_LOGIN"] = "1";
        $_SESSION["ID_ADMIN"] = $id;
        header("Location:index.php");
    }else{
        $_SESSION["ERROR_SISTEM"] = "Login tidak valid!";
        header("Location:index.php");
    }
}

function logout(){
    unset($_SESSION['SUDAH_LOGIN']);
    unset($_SESSION['ID_ADMIN']);
    header("Location:index.php");
}
?>