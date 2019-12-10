<?php
    session_start();
    echo "<h3> Hallo ".$_SESSION['nama']."!</h3><br>";
?>

<form action="" method="post">
    <input type="submit" value="Sign out" name="signout">
</form>

<?php
    if(isset($_POST['signout']))  { //jika tombol logout ditekan
       header("location: /signin/signout.php"); //mengalihkan halaman
    }
?>

