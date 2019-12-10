<?php
    include '../config/connect.php';
    session_start();
    $id = $_GET['id'];  
    if(isset($_POST['editKeluhan'])) {
            $id = $_POST['id'];
            $sasaran = $_POST['sasaran'];
            $keluhan = $_POST['keluhan'];
            $saran = $_POST['saran'];
            mysqli_query($con, "update keluhan set sasaran='$sasaran', keluhan='$keluhan', saran='$saran' where id=$id");
            header('location: /user/riwayat_keluhan.php');
        
    }
      
    $members = mysqli_query($con, "select *from keluhan where id=$id order by id desc");
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
    <link rel="stylesheet" href="/assets/css/user-dashoard.css">
    <link rel="stylesheet" href="/assets/css/animate.css">
</head>

<body>
    <form action="edit_keluhan.php" method="post">
        <div class="modal-body mx-5">
        <input type="hidden" name="id"  class="form-control" value="<?php echo $mem['id']; ?>" />
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" readonly class="form-control" name="kategori" value="<?php echo $mem['kategori'];?>">
            </div>
            <div class="form-group">
                <label>Sasaran</label>
                <select class="custom-select" id="inputGroupSelect01" name="sasaran" >
                    <option selected>
                        <?php echo $mem['sasaran'];?>
                    </option>
                    <?php
                        include '../config/connect.php';

                        if($mem['kategori'] == 'Dosen') {
                            $query = mysqli_query($con, "select nama_dosen from dosen");
                            $menu ="";
                            while($row=mysqli_fetch_array($query)){
                                $menu .= "<option>".$row['nama_dosen']."</option>"; 
                            }
                            echo $menu;
                        }
                        if($mem['kategori'] == 'Lab. Komputasi') {
                        ?>
                    <option value="Lab. RPL">Lab. RPL</option>
                    <option value="Lab. Multimedia">Lab. Multimedia</option>
                    <option value="Lab. Studio">Lab. Studio</option>
                    <option value="Lab. Komputasi Dasar">Lab. Komputasi Dasar</option>
                    <option value="Lab. Pemrograman Dasar">Lab. Pemrograman Dasar</option>
                    <option value="Lab. Pemrograman Lanjut">Lab. Pemrograman Lanjut</option>
                    <option value="Lab. Mikrokontroller">Lab. Mikrokontroller</option>
                    <option value="Lab. Jaringan">Lab. Jaringan</option>
                    <option value="Lab. Sertifikasi">Lab. Sertifikasi</option>
                    <option value="Pengelola / Asisten Lab">Pengelola / Asisten Lab</option>

                    <?php
                        }
                        if($mem['kategori'] == 'Ruangan') {
                            ?>
                    <option value="Ruang 1">Ruang 1</option>
                    <option value="Ruang 2">Ruang 2</option>
                    <option value="Ruang 3">Ruang 3</option>
                    <option value="Ruang 4">Ruang 4</option>
                    <?php
                        }
                    ?>

                </select>
            </div>
            <div class="form-group">
                <label>Keluhan</label>
                <textarea class="form-control" rows="5" name="keluhan"><?php echo $mem['keluhan'];?></textarea>
            </div>
            <div class="form-group">
                <label>Saran</label>
                <textarea class="form-control" rows="5" name="saran"><?php echo $mem['saran'];?></textarea>
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="text" class="form-control" name="tanggal" readonly value="<?php echo $mem['tanggal'];?>">
            </div>
            <div class="form-group">
                <label>Status</label>
                <input type="text" class="form-control" name="status" readonly value="<?php echo $mem['status'];?>">
            </div>

            <div class="modal-footer">
                <input type="button" class="btn btn-danger" value="Tutup" data-dismiss="modal">
                <input type="submit" class="btn btn-info" value="Simpan" name="editKeluhan">
            </div>
        </div>
    </form>
   

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/vendor/popper.js/dist/popper.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>