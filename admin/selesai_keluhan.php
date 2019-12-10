<?php
    include '../config/connect.php';
    
    $id = $_GET['id']; //jika menemukan id yang dicari 
    $query="update keluhan set status='Selesai' where id=$id"; //query untuk menghapus data berdasarkan id
    $exe_query=mysqli_query($con, $query); //mengeksekusi query
 
    header("Location: /admin/data_keluhan.php"); //menglihkan ke halaman index.php
    
?>