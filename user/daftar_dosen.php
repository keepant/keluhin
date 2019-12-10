<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Daftar Dosen</title>
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
                    <li class="menu-item">
                        <a href="/user/riwayat_keluhan.php">
                            <i class="menu-icon fas fa-history"></i>Riwayat Keluhan</a>
                    </li>
                    <li class="active">
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
                                <strong class="card-title">Daftar Dosen D3 Tekink Informatika</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIDN</th>
                                            <th>NIP</th>
                                            <th>Nama Dosen</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        include '../config/connect.php';
                                        $no = 0;
                                        $query = mysqli_query($con, "select *from dosen");
                                        while ($row = mysqli_fetch_array($query)) {
                                        $no++;
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $no?></td>
                                            <td><?php echo $row['nidn']?></td>
                                            <td><?php echo $row['nip']?></td>
                                            <td><?php echo $row['nama_dosen']?></td>
                                        </tr>
                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div>
    </div>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/vendor/popper.js/dist/popper.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/profil.js"></script>
</body>

</html>