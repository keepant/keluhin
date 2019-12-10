`
<?php
    include '../config/connect.php';
    session_start();

    $id = $_GET['id'];
    $members = mysqli_query($con, "select *from mahasiswa where id=$id");
    $mem = mysqli_fetch_array($members);
    $nim = $mem['nim'];
    $keluhan = mysqli_num_rows(mysqli_query($con, "select *from keluhan where nim='$nim'"));    
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
    <form action="" method="post">
        <div class="modal-body mx-5">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><strong>NIM</strong></label>
                <div class="col-md-10">
                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $mem['nim'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><strong>Nama</strong></label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $mem['nama'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><strong>Kelas</strong></label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $mem['kelas'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><strong>Angkatan</strong></label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $mem['angkatan'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><strong>E-Mail</strong></label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $mem['email'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><strong>Jumlah Keluhan</strong></label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $keluhan;?>">
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-danger" value="Tutup" data-dismiss="modal" name="detailDosen">
            </div>
        </div>
    </form>


    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/vendor/popper.js/dist/popper.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>