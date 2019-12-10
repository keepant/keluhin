<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Riwayat Keluhan</title>
    <meta name="description" content="User Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/assets/css/user-dashoard.css">
    <link rel="stylesheet" href="/assets/css/animate.css">

</head>

<body>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="menu-item">
                        <a href="index.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Keluh-in</li>
                    <li class="menu-item">
                        <a href="/user/ajukan_keluhan.php">
                            <i class="menu-icon fas fa-sign-in-alt"></i>Ajukan Keluhan</a>
                    </li>
                    <li class="active">
                        <a href="/user/riwayat_keluhan.php">
                            <i class="menu-icon fas fa-history"></i>Riwayat Keluhan</a>
                    </li>
                    <li class="menu-item">
                        <a href="/user/daftar_dosen.php">
                            <i class="menu-icon fas fa-clipboard-list"></i>Daftar Dosen</a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>

    <div id="right-panel" class="right-panel">
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">User Dashboard</a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <?php
                            include '../config/connect.php';
                            session_start();
                            echo "<p>hello, ".$_SESSION['nama']."</p>";
                        ?>
                    </div>
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="/assets/img/profil.png" alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <div class="details">
                                <?php
                                    echo "<h6>".$_SESSION['nama']."</h6>"; 
                                    echo "<p>".$_SESSION['signin']."</p>";
                                    echo "<p>".$_SESSION['nim']."</p>"
                                ?>
                                <hr>
                            </div>
                            <a class="nav-link" href="#" data-whatever="<?php echo $_SESSION['signin']?>"
                                data-toggle="modal" data-target="#detailProfil"><i class="fa fa-user"></i>Profil</a>
                            <a class="nav-link" href="/signin/signout.php"><i class="fa fa-power-off"></i>Sign Out</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <!--- MODAL Hapus keluhan -->
        <div class="modal fade" id="hapusRiwayat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        Apakah anda yakin ingin menghapus data keluhan?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
                        <form method="post" action="">
                            <a href="#" class="btn btn-danger" id="delete_link" name="hapus">Iya</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--- MODAL Detail -->
        <div class="modal fade" id="detailKeluhan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Detail Keluhan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="dash">

                    </div>
                </div>
            </div>
        </div>

        <!--- MODAL Edit -->
        <div class="modal fade" id="editKeluhan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Edit Keluhan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="dash">

                    </div>
                </div>
            </div>
        </div>

        <!--- MODAL Profil -->
        <div class="modal fade" id="detailProfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Profil</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="dash">

                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Riwayat Keluhan</strong>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th>Kategori</th>
                                            <th>Sasaran</th>
                                            <th>Keluhan</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <?php
                                        include '../config/connect.php';
                                        $no=0;
                                        $query = mysqli_query($con, "select *from keluhan where nim='$_SESSION[nim]' order by id desc");
                                        while ($row = mysqli_fetch_array($query)) {
                                        $no++;
                                    ?>

                                    <tbody>
                                        <tr>
                                            <td class="serial">
                                                <?php echo $no?>
                                            </td>
                                            <td>
                                                <?php echo $row['kategori']?>
                                            </td>
                                            <td>
                                                <?php echo $row['sasaran']?>
                                            </td>
                                            <td>
                                                <?php echo $row['keluhan']?></td>
                                            <td>
                                                <?php echo $row['tanggal']?></td>
                                            <td>
                                                <?php
                                                    if($row['status'] == 'Verifikasi') {
                                                ?>
                                                <span class="badge badge-verifikasi">
                                                    <?php echo $row['status']?>
                                                </span>
                                                <?php
                                                    } else if($row['status'] == 'Ditolak') {
                                                ?>
                                                <span class="badge badge-ditolak">
                                                    <?php echo $row['status']?>
                                                </span>
                                                <?php
                                                    } else if($row['status'] == 'Proses') {
                                                ?>
                                                <span class="badge badge-proses">
                                                    <?php echo $row['status']?>
                                                </span>
                                                <?php
                                                    } else {
                                                ?>
                                                <span class="badge badge-complete">
                                                    <?php echo $row['status']?>
                                                </span>
                                                <?php
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if ($row['status'] == 'Verifikasi'){

                                                ?>
                                                <button class="btn btn-outline-info btn-sm" data-whatever="<?php echo $row['id']?>"
                                                    data-toggle="modal" data-target="#detailKeluhan">
                                                    <i class="fas fa-info-circle"></i>
                                                </button>
                                                <button class="btn btn-outline-warning btn-sm" data-toggle="modal"
                                                    data-whatever="<?php echo $row['id']?>" data-target="#editKeluhan">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <a href="#" onclick="confirm_modal('/user/hapus_keluhan.php?&id=<?php echo $row['id']; ?>');"
                                                    class="btn btn-outline-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                    </button>
                                                    <?php
                                                    } 
                                                    if ($row['status'] == 'Proses' || $row['status'] == 'Selesai' || $row['status'] == 'Ditolak'){
                                                ?>
                                                    <button class="btn btn-outline-info btn-sm" data-whatever="<?php echo $row['id']?>"
                                                        data-toggle="modal" data-target="#detailKeluhan">
                                                        <i class="fas fa-info-circle"></i>
                                                    </button>
                                                    <button class="btn btn-outline-warning btn-sm" disabled>
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-outline-danger btn-sm" disabled>
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <?php   }
                                                ?>
                                            </td>
                                        </tr>

                                    </tbody>

                                    <?php   }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/vendor/popper.js/dist/popper.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/profil.js"></script>
    <script>
        $('#detailKeluhan').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            var modal = $(this);
            var dataString = 'id=' + recipient;
            $.ajax({
                type: "GET",
                url: "detail_keluhan.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.dash').html(data);
                },
                error: function (err) {
                    console.log(err);
                }
            });
        });

        $('#editKeluhan').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            var modal = $(this);
            var dataString = 'id=' + recipient;
            $.ajax({
                type: "GET",
                url: "edit_keluhan.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.dash').html(data);
                },
                error: function (err) {
                    console.log(err);
                }
            });
        });

        function confirm_modal(delete_url) {
            $('#hapusRiwayat').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('delete_link').setAttribute('href', delete_url);
        }
    </script>
</body>

</html>