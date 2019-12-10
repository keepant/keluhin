<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <meta name="description" content="User Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/assets/vendor/MDB-Free_4.6.0/css/mdb.min.css">
    <link rel="stylesheet" href="/assets/css/user-dashoard.css">

</head>

<body>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
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
                    <a class="navbar-brand" href="#">User Dashboard Logo</a>
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
            <h2>Alur Keluh-in</h2>
            <hr>
            <div class="row mt-1">
                <div class="col-md-12">
                    <ul class="stepper stepper-vertical">
                        <li class="completed">
                            <a href="#!">
                                <span class="circle">1</span>
                                <span class="label">Buka website Keluh-in</span>
                            </a>
                            <div class="step-content grey lighten-3">
                                <p>buka website keluhin dan lakukan sign in atau sign up jika belum mempunyai akun</p>
                            </div>
                        </li>
                        <li class="completed">
                            <a href="#!">
                                <span class="circle">2</span>
                                <span class="label">Keluh-in Masalahmu</span>
                            </a>
                            <div class="step-content grey lighten-3">
                                <p>keluhkan setiap masalahmu tanpa ada batasan yang menganggumu.</p>
                            </div>
                        </li>

                        <li class="completed">
                            <a href="#!">
                                <span class="circle">3</span>
                                <span class="label">Admin memproses keluhan</span>
                            </a>
                            <div class="step-content grey lighten-3">
                                <p>tunggu sampai pihak berwenang memproses masalahmu sampai ke akar-akarnya.</p>
                            </div>
                        </li>

                        <li class="success-color">
                            <a href="#!">
                                <span class="circle"><i class="fas fa-check"></i></span>
                                <span class="label">Masalah diselesaikan</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/profil.js"></script>

 
</body>

</html>