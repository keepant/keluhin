<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sign Up</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="/assets/css/login.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="/assets/css/animate.css" />
</head>
<body>

<div class="wrapper animated fadeInDown">
  <div id="formContent">
    <h2 class="inactive underlineHover"> <a href="index.php?signin">Sign In </h2> </a>
    <h2 class="active"> Sign Up </h2>

    <form acion="" method="post">
      <input type="text" class="animated fadeIn delay-1s" name="nama" placeholder="nama" required>
      <input type="text" class="animated fadeIn delay-1s" name="nim" placeholder="nim" required>
      <input type="email" class="animated fadeIn delay-1s" name="email" placeholder="email" required>
      <input type="password" class="animated fadeIn delay-1s" name="password" placeholder="password" required>
      <input type="submit" class="animated fadeIn delay-2s" value="Sign Up" name="signup">
    </form>

  </div>    
</div>


<?php
    if(isset($_POST['signup'])) { 
        $nama = $_POST['nama']; 
        $nim = $_POST['nim'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "insert into mahasiswa (nama, nim, email, password) values ('$nama', '$nim', '$email', '$password')";  //menambahkan data
        $exe_query=mysqli_query($con, $query) or die (mysql_error()); //mejalalankan perintah query.

        if($exe_query) { //jika berhasil ditambahkan
          print "Data Berhasil ditambahkan!".mysqli_affected_rows(); 
        } else {
          print 'Tidak bisa';
        }

        header('location: /signin/index.php?signin');
    }
?>

</body>
</html>