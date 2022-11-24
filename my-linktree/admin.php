<?php 
// memangil / menjalankan fungsi session
session_start();
// mengecek apakah status user sudah login
if($_SESSION["status"] != true)
{
    // jika belum login response header nya mengarah ke file index.php
    header("Location: index.php");
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mohamad Rizky Isa | Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/img/profile.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <meta content="Hai Teman-teman, Perkenalkan Nama Saya Mohamad Rizky Isa Junior Software Engginer, yang mempunyai pengalaman di bidang Programing lebih dari 4 tahun, Di sela sela waktu luang, saya sering berbagi ilmu dalam kegiatan webinar mau seminar lokal. untuk saat ini saya sedang menempuh pendidikan di salah universitas swasta yang berada di gorontalo, dengan mengambil jurusan Teknik Informatika." name="description">
    <meta content="Mohamad Rizky isa" name="keywords">
    <meta name="author" content="Mohamad Rizky Isa" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<style>
    a{
        text-decoration: none;
    }
</style>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3>Main Menu</h3>
                        <p>Selamat Datang, <strong><?= $_SESSION["username"] ?></strong></p>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <a href="setting.php">
                                    <div class="card bg-success">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <i class="fa fa-wrench text-light fa-2x"></i>
                                            </div>
                                            <h5 class="text-center mt-4 text-light">Setting Web</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 mb-2">
                                <a href="user.php">
                                    <div class="card bg-dark">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <i class="fa fa-users text-light fa-2x"></i>
                                            </div>
                                            <h5 class="text-center mt-4 text-light">Data Pengguna</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 mb-2">
                                <a href="core/logout.php">
                                    <div class="card bg-danger">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <i class="fa fa-arrow-left text-light fa-2x"></i>
                                            </div>
                                            <h5 class="text-center mt-4 text-light">Logout</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 mb-2">
                                <a href="http://">          
                                    <div class="card bg-info">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <i class="fa fa-info text-light fa-2x"></i>
                                            </div>
                                            <h5 class="text-center mt-4 text-light">About</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>