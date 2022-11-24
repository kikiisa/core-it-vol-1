<?php 
error_reporting(0);
session_start();
include_once "core/connection.php";

if($_SESSION["status"] == true)
{
    header("Location: admin.php");
}

$sql = "SELECT * FROM tb_profile";
$result = $conn->query($sql)->fetch_array();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?= $result["name"] ?> | Profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/img/profile.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <meta content="<?= $result["deskripsi"] ?>" name="description">
    <meta content="<?= $result["name"] ?>" name="keywords">
    <meta name="author" content="<?= $result["name"] ?>" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-12 text-center">
                        <img src="<?= $result["profile"] == '' ? 'assets/img/profile.png' : 'file/'.$result["profile"] ?>" width="90" class="rounded-circle shadow" alt="" srcset="">
                        <h5 class="text-light mt-4 nstagram animate__bounceIn"><strong><?= $result["name"] ?></strong></h5>
                        <p class="text-light nstagram animate__bounceIn"><?= $result["title"] ?></p>
                        <hr>
                    </div>
                    <div class="col-md-6 col-9 mb-4 mt-4 animate__pulse">
                        <div class="card border-0 rounded-pill shadow animate__bounceIn" onclick="open_popup()">
                            <div class="card-body">
                                <div class="text-center">
                                    <i class="fa-2x  fa fa-user"></i><strong class="ms-3">About Me</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-9 mb-4 mt-4 animate__pulse">
                        <div class="card border-0 rounded-pill shadow animate__bounceIn" onclick="klik('ig')">
                            <div class="card-body">
                                <div class="text-center">
                                    <i class="fa-2x  fab fa-instagram"></i><strong class="ms-3">Instagram</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-9 mb-4 mt-4">
                        <div class="card border-0 rounded-pill shadow animate__bounceIn" onclick="klik('yt')">
                            <div class="card-body">
                                <div class="text-center">
                                    <i class="fa-2x  fab fa-youtube"></i><strong class="ms-3">Youtube</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-9 mb-4 mt-4">
                        <div class="card border-0 rounded-pill shadow animate__bounceIn" onclick="klik('wa')">
                            <div class="card-body">
                                <div class="text-center">
                                    <i class="fa-2x  fab fa-whatsapp"></i><strong class="ms-3">Whatsapp</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-9 mb-4 mt-4">
                        <div class="card border-0 rounded-pill shadow animate__bounceIn git" onclick="klik('git')">
                            <div class="card-body">
                                <div class="text-center">
                                    <i class="fa-2x  fab fa-github"></i><strong class="ms-3">Github</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal border-0 bd-example-modal-lg" id="modal-link" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <h3>About Me</h3>
                        <hr>
                        <div class="bio">
                           <?= $result["deskripsi"] ?>
                        </div>
                        <div class="skill text-start mt-4">
                            <p>Berikut ini skill dan keahlian saya dalam bidang programing </p>
                            <p><strong>Skill</strong></p>
                            <?php 
                                $divider = explode(",",$result["skill"]);
                            ?>
                            <?php foreach($divider as $dx){ ?>
                                <?= "<span class='badge bg-dark'>$dx</span>" ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
            integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
        </script>
        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/solid.js"
            integrity="sha384-/BxOvRagtVDn9dJ+JGCtcofNXgQO/CCCVKdMfL115s3gOgQxWaX/tSq5V8dRgsbc" crossorigin="anonymous">
        </script>
        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/fontawesome.js"
            integrity="sha384-dPBGbj4Uoy1OOpM4+aRGfAOc0W37JkROT+3uynUgTHZCHZNMHfGXsmmvYTffZjYO" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
        <script>
            const open_popup = () => {
                const modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('modal-link'));
                modal.show();
            }


            const klik = (params) => {

                if (params == "yt") {
                    window.location.href = "<?= $result["youtube"] ?>"
                }

                if (params == "ig") {
                    window.location.href = "<?= $result["instagram"] ?>"
                }

                if (params == "git") {
                    window.location.href = "<?= $result["github"] ?>"
                }

                if (params == "wa") {
                    window.location.href = "<?= $result["whatsapp"] ?>"
                }


            }
        </script>
</body>

</html>