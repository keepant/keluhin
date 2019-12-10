`
<?php
    include '../config/connect.php';
    session_start();

    $id = $_SESSION['signin'];
    if(isset($_POST['simpan'])) {
        $id = $_SESSION['signin'];
        $nama = $_POST['nama'];
        mysqli_query($con, "update admin set nama='$nama' where username='$id'");
        header('location: /admin/index.php');
}
    $members = mysqli_query($con, "select *from admin where username='$id'");
    $mem = mysqli_fetch_array($members); 
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Detail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/assets/css/admin-dashboard.css">
    <link rel="stylesheet" href="/assets/css/animate.css">
</head>

<body>
    <form action="detail_profil.php" method="post">
        <div class="modal-body mx-5">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><strong>Username</strong></label>
                <div class="col-md-10">
                    <input type="text" readonly class="form-control" value="<?php echo $mem['username'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><strong>Nama</strong></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="<?php echo $mem['nama'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><strong>E-Mail</strong></label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control"  value="<?php echo $mem['email'];?>">
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-danger" value="Tutup" data-dismiss="modal" name="detailDosen">
                <input type="submit" class="btn btn-success" value="Simpan" name="simpan">
            </div>
        </div>
    </form>


    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/vendor/popper.js/dist/popper.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>