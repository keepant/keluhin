<?php
    include '../config/connect.php';
    session_start();
    $id = $_GET['id'];  
    if(isset($_POST['editDosen'])) {
            $id = $_POST['id'];
            $nidn = $_POST['nidn'];
            $nip = $_POST['nip'];
            $nama = $_POST['nama'];
            mysqli_query($con, "update dosen set nidn='$nidn', nip='$nip', nama_dosen='$nama' where id=$id");
            header('location: /admin/data_dosen.php');
        
    }
      
    $members = mysqli_query($con, "select *from dosen where id=$id");
    $mem = mysqli_fetch_array($members);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/assets/css/admin-dashboard.css">
    <link rel="stylesheet" href="/assets/css/animate.css">
</head>

<body>
    <form action="edit_dosen.php" method="post">
        <div class="modal-body mx-5">
        <input type="hidden" name="id"  class="form-control" value="<?php echo $mem['id']; ?>" />
            <div class="form-group">
                <label>NIDN</label>
                <input type="number" class="form-control" name="nidn" value="<?php echo $mem['nidn'];?>">
            </div>
            <div class="form-group">
                <label>NIP</label>
                <input type="number" class="form-control" name="nip" value="<?php echo $mem['nip'];?>">
            </div>
            <div class="form-group">
                <label>Nama Dosen</label>
                <input type="text"  class="form-control" name="nama" value="<?php echo $mem['nama_dosen'];?>">
            </div>

            <div class="modal-footer">
                <input type="button" class="btn btn-danger" value="Tutup" data-dismiss="modal">
                <input type="submit" class="btn btn-info" value="Simpan" name="editDosen">
            </div>
        </div>
    </form>
   

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/vendor/popper.js/dist/popper.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>