<?php 
// memanggil connection.php
include_once "core/connection.php";
include_once "core/Flash.php";

// memangil / menjalankan fungsi session
session_start();
// mengecek apakah status user sudah login
if($_SESSION["status"] != true)
{
    // jika belum login response header nya mengarah ke file index.php
    header("Location: index.php");
}

// query untuk mengambil semua data yang ada pada tabel tb_profile
$sql = "SELECT * FROM tb_profile";

// mengeksekusi  
$result = $conn->query($sql);

// parsing data yang diminta dalam bentuk array
$x = $result->fetch_array();



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mohamad Rizky Isa | Setting</title>
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
    <div class="container mb-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-header bg-primary text-light">Setting Web</div>
                    <div class="card-body">
                        <a href="admin.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <hr>
                        <?= flash() ?>
                        <form action="core/Fungsi.php" enctype="multipart/form-data" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <img src="<?= $x["profile"] == '' ? 'assets/img/profile.png' : 'file/'.$x["profile"] ?>"  alt="" class="img-thumbnail" srcset="">
                                    <input type="file" name="profile" class="form-contol-file mt-3">
                                    <small class="text-danger">* Kosongkan jika tidak ingin di update</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group mb-2">
                                        <label><strong>Nama Pemilik</strong></label>
                                        <input type="text" name="nama_file" value="<?= $x["profile"]; ?>" hidden>
                                        <input type="text" name="nama" value="<?= $x["name"] ?>" required placeholder="Nama Pemilik" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label><strong>Title Pemilik</strong></label>
                                        <input type="text" name="title" value="<?= $x["title"] ?>" required placeholder="Title Pemilik" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label><strong>Link Instagram</strong></label>
                                        <input type="text" name="instagram" value="<?= $x["instagram"] ?>" required placeholder="Link Instagram" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label><strong>Link Youtube</strong></label>
                                        <input type="text" name="youtube" value="<?= $x["youtube"] ?>" required placeholder="Link Youtube" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label><strong>Link Whatsapp</strong></label>
                                        <input type="text" name="whatsapp" value="<?= $x["whatsapp"] ?>" required placeholder="Link Whatsapp" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label><strong>Link Github</strong></label>
                                        <input type="text" name="github" value="<?= $x["github"] ?>" required placeholder="Link Github" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label><strong>Skill</strong></label>
                                        <input type="text" name="skill" value="<?= $x["skill"] ?>" name="skill" class="form-control" placeholder="Example : Laravel,Codeigniter,Express Js">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label><strong>Deksripsi</strong></label>
                                        <textarea name="deskripsi" class="form-control" required cols="30" rows="10"><?= $x["deskripsi"] ?></textarea>
                                    </div>

                                    <button class="mt-3 btn btn-primary" name="update"><i class="fa fa-save"></i> update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>