<?php
// memanggil connection.php
include_once "core/connection.php";
include_once "core/Flash.php";
// memangil / menjalankan fungsi session
session_start();
// mengecek apakah status user sudah login
if ($_SESSION["status"] != true) {
    // jika belum login response header nya mengarah ke file index.php
    header("Location: index.php");
}

// query untuk mengambil semua data yang ada pada tabel tb_profile
$sql = "SELECT * FROM tb_user";

// mengeksekusi  
$result = $conn->query($sql);

if (isset($_GET["edit"])) {
    $id = $_GET["edit"];
    $query = "SELECT * FROM tb_user WHERE id = '$id'";
    $get = $conn->query($query)->fetch_array();
}   
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mohamad Rizky Isa | Daftar User</title>
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
        <div class="row">
            <?= flash() ?>
            <div class="col-md-8">
                <div class="card border-0">
                    <div class="card-header bg-primary text-light">Daftar User</div>
                    <div class="card-body">
                        <a href="admin.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <a href="user.php" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 0 ?>
                                <?php while ($data = $result->fetch_array()) { ?>
                                    <tr>
                                        <th scope="row"><?= $nomor+=1 ?></th>
                                        <td><?= $data["name"] ?></td>
                                        <td><?= $data["email"] ?></td>
                                        <td>
                                            <a href="core/Fungsi.php?hapus=<?= $data["id"]  ?>" onclick="return confirm('Apakah anda akan menghapus data yang bernama <?= $data['name'] ?> ')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            <a href="user.php?edit=<?= $data["id"]  ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php if (isset($_GET["edit"])) { ?>
                <div class="col-md-4">
                    <form action="core/Fungsi.php" method="post">
                        <div class="card border-0">
                            <div class="card-header bg-primary text-light">Edit User</div>
                            <input type="hidden" name="id" value="<?= $get["id"] ?>">
                            <div class="card-body">
                                <div class="form-group mb-4">
                                    <input type="text" name="nama" class="form-control" required value="<?= $get["name"] ?>" placeholder="Jhon Dhoe">
                                </div>
                                <div class="form-group mb-4">
                                    <input type="email" name="email" class="form-control" required value="<?= $get["email"] ?>" placeholder="Jhon@example.com">
                                </div>
                                <div class="form-group mb-4">
                                    <input type="password" name="password" value="" class="form-control" placeholder="Password">
                                    <small>* Kosongkan Password Bila Tidak Ingin Di Ubah</small>
                                </div>
                                <button class="btn btn-primary w-100" name="update_user">simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } else { ?>
                <div class="col-md-4">
                    <form action="core/Fungsi.php" method="post">
                        <div class="card border-0">
                            <div class="card-header bg-primary text-light">Tambah User</div>
                            <div class="card-body">
                                <div class="form-group mb-4">
                                    <input type="text" name="nama" required class="form-control"  placeholder="Jhon Dhoe">
                                </div>
                                <div class="form-group mb-4">
                                    <input type="email" name="email" required class="form-control" placeholder="Jhon@example.com">
                                </div>
                                <div class="form-group mb-4">
                                    <input type="password" name="password" required class="form-control" placeholder="Password">
                                </div>
                                <button class="btn btn-primary w-100" name="simpan">simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
    <script>
        <?php if ($_GET["status"] == 'ekstension') { ?>
            alert("Periksa Kembali File Ekstensi anda, yang hanya di izinkan (JPG,PNG,JPEG,GIF)")
        <?php } ?>
        <?php if ($_GET["status"] == true) { ?>
            alert("Aksi Berhasil")
        <?php } ?>
        <?php if ($_GET["status"] == false) { ?>
            alert("Aksi Gagal")
        <?php } ?>
        <?php if ($_GET["hapus"] == true) { ?>
            alert("Berhasil")
        <?php } ?>
    </script>
</body>

</html>