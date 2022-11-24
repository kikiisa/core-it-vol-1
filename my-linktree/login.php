<?php 
require_once 'core/Flash.php';
error_reporting(0);
session_start();
if($_SESSION["status"] == true)
{
    header("Location: admin.php");
}



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mohamad Rizky Isa | Login</title>
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

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-8">
                <div class="row justify-content-center">
                    <div class="card">
                        <div class="card-body">
                            <?= flash() ?>
                            <form action="core/Fungsi.php" method="post">
                                <h5>Masuk Dengan Akun</h5>
                                <div class="input-group mb-4 mt-4">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                    <input type="email" name="email" class="form-control" required placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-4">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-key"></i></span>
                                    <input type="password" name="password" required class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
                                </div>
                                <button class="btn btn-dark w-100" name="login">Masuk</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>