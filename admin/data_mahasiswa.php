<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta name="description" content="Admin Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/admin-dashboard.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">Admin Dashboard</a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="/admin/index.php"> <i class="menu-icon fas fa-laptop"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Data</h3>
                    <li>
                        <a href="/admin/data_keluhan.php"> <i class="menu-icon fas fa-bug"></i>Keluhan </a>
                    </li>
                    <li>
                        <a href="/admin/data_dosen.php"> <i class="menu-icon fas fa-user-graduate"></i>Dosen </a>
                    </li>
                    <li>
                        <a href="/admin/data_mahasiswa.php"> <i class="menu-icon fas fa-users"></i>Mahasiswa </a>
                    </li>
                    <h3 class="menu-title">Laporan</h3>
                    <li>
                        <a href="/admin/laporan_keluhan.php"> <i class="menu-icon fas fa-file-alt"></i>Laporan Keluhan </a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>
    <!-- Left Panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                <?php
                    session_start();
                    echo "<p><strong>Hai ".$_SESSION['nama']."!"."</p></strong>";
                ?>
                </div>
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="/assets/img/profil2.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <div class="details">
                                <?php
                                    echo "<h6>".$_SESSION['nama']."</h6>"; 
                                    echo "<p>".$_SESSION['signin']."</p>";
                                ?>
                                <hr>
                            </div>
                            <a class="nav-link" href="" data-whatever="<?php echo $_SESSION['signin']?>"
                                data-toggle="modal" data-target="#detailProfil"><i class="fa fa-user"></i> Profile</a>
                            <a class="nav-link" href="/signin/signout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="language" aria-haspopup="true"
                            aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                    </div>
                </div>
            </div>
        </header>

         <!--- MODAL Detail -->
         <div class="modal fade" id="detailMahasiswa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Detail data mahasiswa</h4>
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

        <div class="modal fade" id="hapusMahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    Apakah anda yakin ingin menghapus data?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                    <form method="post" action="">
                        <button type="submit" class="btn btn-danger" name="hapus">Iya</button>
                    </form>
                </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
        <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Mahasiswa</strong>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Angkatan</th>
                                            <th>Email</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <?php
                                        include '../config/connect.php';
                                        $no=0;
                                        $query = mysqli_query($con, "select *from mahasiswa order by id asc");
                                        while ($row = mysqli_fetch_array($query)) {
                                        $no++;
                                    ?>

                                    <tbody>
                                        <tr>
                                            <td class="serial">
                                                <?php echo $no?>
                                            </td>
                                            <td>
                                                <?php echo $row['nim']?>
                                            </td>
                                            <td>
                                                <?php echo $row['nama']?>
                                            </td>
                                            <td>
                                                <?php echo $row['kelas']?>
                                            </td>
                                            <td>
                                                <?php echo $row['angkatan']?>
                                            </td>
                                            <td>
                                                <?php echo $row['email']?>
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-info btn-sm" data-whatever="<?php echo $row['id']?>"
                                                    data-toggle="modal" data-target="#detailMahasiswa">
                                                    <i class="fas fa-info-circle"></i>
                                                </button>
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
        </div> <!-- .content -->
 
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/popper.js/dist/popper.min.js"></script>
    <script src="/assets/js/profil_admin.js"></script>
    <script>
        $('#detailMahasiswa').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            var modal = $(this);
            var dataString = 'id=' + recipient;
            $.ajax({
                type: "GET",
                url: "detail_mahasiswa.php",
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

    </script>
</body>

</html>