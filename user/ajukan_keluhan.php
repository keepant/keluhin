<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ajukan Keluhan</title>
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
                    <li class="active">
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
                    <a class="navbar-brand" href="./">User Dashboard</a>
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
                                    echo "<p>".$_SESSION['nim']."</p>";
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

        <!--- MODAL KELUH-IN DOSEN -->
        <div class="modal fade" id="modalDosen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Keluh-in Dosen</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body mx-5">
                            <div class="row form-group">
                                <div class="col col-sm-12">
                                    <select class="custom-select" id="inputGroupSelect01" name="nama">
                                        <option selected>Pilih dosen...</option>
                                    <?php
                                        include '../config/connect.php';
                                        $query = mysqli_query($con, "select nama_dosen from dosen");
                                        $menu ="";
                                        while($row=mysqli_fetch_array($query)){
                                            $menu .= "<option>".$row['nama_dosen']."</option>"; 
                                        }
                                        echo $menu;
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-sm-12">
                                    <textarea placeholder="Keluhan" name="keluhan" rows="5" class="form-control"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-sm-12">
                                    <textarea placeholder="Saran" name="saran" rows="5" class="form-control" required></textarea>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-outline-success btn-lg" value="Kirim" name="kirimDosen">
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['kirimDosen'])  ) { 
                            $sasaran= $_POST['nama'];
                            $keluhan = $_POST['keluhan'];
                            $saran = $_POST['saran'];
                            $nim = $_SESSION['nim'];
                            $kategori = "Dosen";
                            $tanggal = date('d M Y');
                            $status = "Verifikasi";

                            $queryKeluhan = mysqli_query($con, "insert into keluhan (nim, kategori, sasaran, keluhan, saran, tanggal, status) 
                            values ('$nim','$kategori','$sasaran','$keluhan','$saran','$tanggal','$status')");
                            // $query = mysqli_query($con, "insert into keluhan (nim, kategori, sasaran, keluhan, saran, tanggal, status) 
                            // values ('$nim','$kategori','$sasaran','$keluhan','$saran','$tanggal','$status'");
                        }
                    ?>
                </div>
            </div>
        </div>

        <!--- MODAL KELUH-IN LABKOM -->
        <div class="modal fade" id="modalLabkom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Keluh-in Laboratorium Komputasi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body mx-5">
                            <div class="row form-group">
                                <div class="col col-sm-12">
                                    <select class="custom-select" id="inputGroupSelect01" name="lab">
                                        <option selected>Pilih Lab...</option>
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
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-sm-12">
                                    <textarea placeholder="Keluhan" name="keluhan" name="keluhan" rows="5" class="form-control"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-sm-12">
                                    <textarea placeholder="Saran" name="saran" name="saran" rows="5" class="form-control" required></textarea>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-outline-success btn-lg" value="Kirim" name="kirimLabkom">
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['kirimLabkom'])  ) { 
                            $sasaran= $_POST['lab'];
                            $keluhan = $_POST['keluhan'];
                            $saran = $_POST['saran'];
                            $nim = $_SESSION['nim'];
                            $kategori = "Lab. Komputasi";
                            $tanggal = date('d M Y');
                            $status = "Verifikasi";

                            $queryKeluhan = mysqli_query($con, "insert into keluhan (nim, kategori, sasaran, keluhan, saran, tanggal, status) 
                            values ('$nim','$kategori','$sasaran','$keluhan','$saran','$tanggal','$status')");
                        }
                    ?>
                </div>
            </div>
        </div>

        <!--- MODAL KELUH-IN RUANG KULIAH -->
        <div class="modal fade" id="modalRuangKuliah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Keluh-in Ruang Kuliah</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body mx-5">
                            <div class="row form-group">
                                <div class="col col-sm-12">
                                    <select class="custom-select" id="inputGroupSelect01" name="ruang">
                                        <option selected>Pilih Ruangan...</option>
                                        <option value="Ruang 1">Ruang 1</option>
                                        <option value="Ruang 2">Ruang 2</option>
                                        <option value="Ruang 3">Ruang 3</option>
                                        <option value="Ruang 4">Ruang 4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-sm-12">
                                    <textarea placeholder="Keluhan" name="keluhan" rows="5" class="form-control"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-sm-12">
                                    <textarea placeholder="Saran" name="saran" rows="5" class="form-control" required></textarea>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-outline-success btn-lg" value="Kirim" name="kirimRuang">
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['kirimRuang'])  ) { 
                            $sasaran= $_POST['ruang'];
                            $keluhan = $_POST['keluhan'];
                            $saran = $_POST['saran'];
                            $nim = $_SESSION['nim'];
                            $kategori = "Ruangan";
                            $tanggal = date('d M Y');
                            $status = "Verifikasi";

                            $queryKeluhan = mysqli_query($con, "insert into keluhan (nim, kategori, sasaran, keluhan, saran, tanggal, status) 
                            values ('$nim','$kategori','$sasaran','$keluhan','$saran','$tanggal','$status')");
                        }
                    ?>
                </div>
            </div>
        </div>

        <!--- MODAL KELUH-IN STAFF -->
        <div class="modal fade" id="modalStaff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Keluh-in Staff Administrasi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body mx-5">
                            <div class="row form-group">
                                <div class="col col-sm-12">
                                    <textarea placeholder="Keluhan" name="keluhan" rows="5" class="form-control"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-sm-12">
                                    <textarea placeholder="Saran" name="saran" rows="5" class="form-control" required></textarea>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-outline-success btn-lg" value="Kirim" name="kirimStaff">
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['kirimStaff'])  ) { 
                            $sasaran= "Staff";
                            $keluhan = $_POST['keluhan'];
                            $saran = $_POST['saran'];
                            $nim = $_SESSION['nim'];
                            $kategori = "Staff Administrasi";
                            $tanggal = date('d M Y');
                            $status = "Verifikasi";

                            $queryKeluhan = mysqli_query($con, "insert into keluhan (nim, kategori, sasaran, keluhan, saran, tanggal, status) 
                            values ('$nim','$kategori','$sasaran','$keluhan','$saran','$tanggal','$status')");
                        }
                    ?>
                </div>
            </div>
        </div>

        <!--- MODAL KELUH-IN KURIKULUM -->
        <div class="modal fade" id="modalKurikulum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Keluh-in Kurikulum</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body mx-5">
                            <div class="row form-group">
                                <div class="col col-sm-12">
                                    <textarea placeholder="Keluhan" name="keluhan" rows="5" class="form-control"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-sm-12">
                                    <textarea placeholder="Saran" name="saran" rows="5" class="form-control" required></textarea>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-outline-success btn-lg" value="Kirim" name="kirimKurikulum">
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['kirimKurikulum'])  ) { 
                            $sasaran= "Kurikulum";
                            $keluhan = $_POST['keluhan'];
                            $saran = $_POST['saran'];
                            $nim = $_SESSION['nim'];
                            $kategori = "Kurikulum";
                            $tanggal = date('d M Y');
                            $status = "Verifikasi";

                            $queryKeluhan = mysqli_query($con, "insert into keluhan (nim, kategori, sasaran, keluhan, saran, tanggal, status) 
                            values ('$nim','$kategori','$sasaran','$keluhan','$saran','$tanggal','$status')");
                        }
                    ?>
                </div>
            </div>
        </div>

        <!--- MODAL KELUH-IN Organisasi -->
        <div class="modal fade" id="modalOrganisasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Keluh-in Organisasi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body mx-5">
                            <div class="row form-group">
                                <div class="col col-sm-12">
                                    <textarea placeholder="Keluhan" name="keluhan" rows="5" class="form-control"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-sm-12">
                                    <textarea placeholder="Saran" name="saran" rows="5" class="form-control" required></textarea>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-outline-success btn-lg" value="Kirim" name="kirimOrganisasi">
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['kirimOrganisai'])  ) { 
                            $sasaran= "Organisasi";
                            $keluhan = $_POST['keluhan'];
                            $saran = $_POST['saran'];
                            $nim = $_SESSION['nim'];
                            $kategori = "Organisasi";
                            $tanggal = date('d M Y');
                            $status = "Verifikasi";

                            $queryKeluhan = mysqli_query($con, "insert into keluhan (nim, kategori, sasaran, keluhan, saran, tanggal, status) 
                            values ('$nim','$kategori','$sasaran','$keluhan','$saran','$tanggal','$status')");
                        }
                    ?>
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
            <?php
                if($queryKeluhan) { ?>
                    <div class="alert alert-success alert-dismissible fade show animated fadeOut delay-4s" role="alert">
                        Keluhan berhasil ditambahkan!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>    
                <?php
                }

            ?>
            <div class="row justify-content-md-around">
                <div class="col-6 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon">
                                    <i class="fas fa-user-graduate text-success"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left">
                                        <div class="stat-text">Dosen</div>
                                        <div class="stat-heading">Keluhkan masalah dosen, kinerja dosen, dan
                                            profesionalitas dosen.</div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-sm-12 text-center">
                                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modalDosen">Keluh-in</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon">
                                    <i class="fas fa-desktop text-warning"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text">Laboratorium Komputasi</div>
                                        <div class="stat-heading">Keluhkan masalah laboratorium komputasi.</div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-sm-12 text-center">
                                <button type="button" class="btn btn-outline-info tombol" data-toggle="modal"
                                    data-target="#modalLabkom">Keluh-in</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon">
                                    <i class="fas fa-building text-info"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">Ruang Kuliah</span></div>
                                        <div class="stat-heading">Keluhkan masalah ruang kuliah, kelengkapan ruangan,
                                            AC, dan lain-lain.</div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-sm-12 text-center">
                                <button type="button" class="btn btn-outline-info tombol" data-toggle="modal"
                                    data-target="#modalRuangKuliah">Keluh-in</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-around">
                <div class="col-6 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon">
                                    <i class="fas fa-user-secret text-dark"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left">
                                        <div class="stat-text">Staff Administrasi</div>
                                        <div class="stat-heading">Keluhkan masalah kinjerja staff dan pegawai di Teknik
                                            Informatika.</div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-sm-12 text-center">
                                <button type="button" class="btn btn-outline-info tombol" data-toggle="modal"
                                    data-target="#modalStaff">Keluh-in</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon">
                                    <i class="fas fa-book text-primary"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left">
                                        <div class="stat-text">Kurikulum</div>
                                        <div class="stat-heading">Keluhkan masalah efektifitas kurikulum dan
                                            kebijakan perkuliahan.</div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-sm-12 text-center">
                                <button type="button" class="btn btn-outline-info tombol" data-toggle="modal"
                                    data-target="#modalKurikulum">Keluh-in</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon">
                                    <i class="fas fa-sitemap text-danger"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left">
                                        <div class="stat-text">Organisasi</div>
                                        <div class="stat-heading">Keluhkan masalah kinjerja organisasi / himpunan
                                            mahasiswa.</div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-sm-12 text-center">
                                <button type="button" class="btn btn-outline-info tombol" data-toggle="modal"
                                    data-target="#modalOrganisasi">Keluh-in</button>
                            </div>
                        </div>
                    </div>
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