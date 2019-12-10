<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sign In</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="/assets/css/login.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="/assets/css/animate.css" />
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

</head>

<body>

  <div class="wrapper">
    <div id="formContent" class="animated fadeInUp">
      <h2 class="active"> Sign In </h2>
      <h2 class="inactive underlineHover"> <a href="index.php?signup">Sign Up </a></h2>
      <div class="animated zoomIn delay-1s">
        <img src="/assets/img/user.png" id="icon" alt="User Icon" />
      </div>

      <form action="" method="post">
        <input type="text" id="login" class="animated fadeIn delay-1s" name="email" placeholder="email atau username" required>
        <input type="password" id="password" class="animated fadeIn delay-1s" name="pass" placeholder="password"
          required>

        <input type="submit" class="animated fadeIn delay-2s" value="Sign In" name="signin">
      </form>

      <div id="formFooter">
        <a class="underlineHover" href="#">Forgot Password?</a>
      </div>
    </div>
  </div>
  <?php
  if(isset($_POST['signin'])  ) { 
    $input_user = $_POST['email'];
    $input_pass = $_POST['pass'];
    
    $_SESSION['email'] = $input_user;
    $_SESSION['pass'] = $input_pass;
    

    $query = "select *from mahasiswa where email='$input_user'"; 
    $exe_query = mysqli_query($con, $query); 
    $data = mysqli_fetch_array($exe_query);
    $email = $data['email']; 
    $password = $data['password']; 
    $nama = $data['nama'];
    $nim = $data['nim'];

    if ($input_user != $email)  { 
      ?>
      <div class="alert alert-danger alert-dismissible animated fadeOut delay-5s" id="pesan" role="alert">
        Email atau Username yang anda masukkan salah!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
        
    } else if ($input_pass != $password)  { 
      ?>
      <div class="alert alert-danger alert-dismissible animated fadeOut delay-5s" id="pesan" role="alert">
        Password yang anda masukkan salah!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
    
    } else {
      $_SESSION['signin'] = $input_user;
      $_SESSION['nama'] = $nama;
      $_SESSION['nim'] = $nim;
      setcookie("user", $_SESSION['siginin'], time()+1800); 
      header("location: /user/index.php");     
    }

    $queryAdmin = "select *from admin where username='$input_user'"; 
    $exe_queryAdmin = mysqli_query($con, $queryAdmin); 
    $dataAdmin = mysqli_fetch_array($exe_queryAdmin);
    $username = $dataAdmin['username']; 
    $passAdmin = $dataAdmin['password']; 
    $namaAdmin = $dataAdmin['nama'];

    if ($input_user != $username)  { 
      ?>
      <div class="alert alert-danger alert-dismissible animated fadeOut delay-5s" id="pesan" role="alert">
        Email atau Username yang anda masukkan salah!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
        
    } else if ($input_pass != $passAdmin)  { 
      ?>
      <div class="alert alert-danger alert-dismissible animated fadeOut delay-5s" id="pesan" role="alert">
        Password yang anda masukkan salah!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
    
    } else {
      $_SESSION['signin'] = $input_user;
      $_SESSION['nama'] = $namaAdmin;
      setcookie("user", $_SESSION['siginin'], time()+1800); 
      header("location: /admin/index.php");     
    }
}
?>
</body>

</html>