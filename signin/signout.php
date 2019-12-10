<?php
    session_start(); //memulai session
    
    unset($_SESSION['signin']); //menghapus session
    header("location: /signin/index.php?signin"); //mengalihkan halaman
?>

