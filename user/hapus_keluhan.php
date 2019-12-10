<?php
    include '../config/connect.php';
    
    $id = $_GET['id']; //jika menemukan id yang dicari 
    $query="delete from keluhan where id=$id"; //query untuk menghapus data berdasarkan id
    $exe_query=mysqli_query($con, $query); //mengeksekusi query
 
    header("Location: /user/riwayat_keluhan.php"); //menglihkan ke halaman index.php
    
?>