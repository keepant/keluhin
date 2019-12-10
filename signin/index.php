<?php
    session_start();
    include '../config/connect.php';

    if (isset($_GET['signin']) && !isset($_SESSION['signin'])) {
        include 'signin.php';
    } else if (isset($_GET['signup'])){
        include 'signup.php';
    } else {
      //  include '/signin/dashboard.php';
    }
?> 