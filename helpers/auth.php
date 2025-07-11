<?php
function is_login(){
    if (isset($_SESSION['SUDAH_LOGIN'])){
        return true;
    }else{
        return false;
    }
}
?>