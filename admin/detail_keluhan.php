`<?php
    include '../config/connect.php';
    session_start();

    $id = $_GET['id'];
    $members = mysqli_query($con, "select *from keluhan where id=$id");
    $mem = mysqli_fetch_array($members);
    $nim = $mem['nim'];
    $query = mysqli_query($con, "select *from mahasiswa where nim='$nim'");
    $mhs = mysqli_fetch_array($query);
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
                <label for="staticEmail" class="col-sm-2 col-form-label"><strong>NIM Pelapor</strong></label>
                <div class="col-md-10">
                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $mhs['nim'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><strong>Nama</strong></label>
                <div class="col-md-10">
                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $mhs['nama'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><strong>Kelas</strong></label>
                <div class="col-md-10">
                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $mhs['kelas'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><strong>Angkatan</strong></label>
                <div class="col-md-10">
                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $mhs['angkatan'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><strong>Kategori</strong></label>
                <div class="col-md-10">
                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $mem['kategori'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><strong>Sasaran</strong></label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $mem['sasaran'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><strong>Keluhan</strong></label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $mem['keluhan'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><strong>Saran</strong></label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $mem['saran'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><strong>Tanggal</strong></label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $mem['tanggal'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><strong>Status</strong></label>
                <div class="col-sm-10">
                    <div type="text" readonly class="form-control-plaintext">
                        <?php
                                                if($mem['status'] == 'Verifikasi') {
                                                ?>
                        <span class="badge badge-verifikasi">
                            <?php echo $mem['status']?>
                        </span>
                        <?php
                                                    } else if($mem['status'] == 'Ditolak') {
                                                ?>
                        <span class="badge badge-ditolak">
                            <?php echo $mem['status']?>
                        </span>
                        <?php
                                                    } else if($mem['status'] == 'Proses') {
                                                ?>
                        <span class="badge badge-proses">
                            <?php echo $mem['status']?>
                        </span>
                        <?php
                                                    } else {
                                                ?>
                        <span class="badge badge-complete">
                            <?php echo $mem['status']?>
                        </span>
                        <?php
                                                    }
                                                ?>
                        <div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-danger" value="Tutup" data-dismiss="modal" name="detailKeluhan">
                    </div>
                </div>
    </form>


    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/vendor/popper.js/dist/popper.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>