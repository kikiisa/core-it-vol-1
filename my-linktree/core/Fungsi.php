<?php
require_once "connection.php";
require_once "Flash.php";
session_start();
if (isset($_POST["login"])) {
    global $conn;
    $email  = trim(htmlspecialchars($_POST["email"]));
    $password  = trim(htmlspecialchars($_POST["password"]));
    $sql = "SELECT * FROM tb_user WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $data = $result->fetch_array();

        if ($data["password"] == md5($password)) {
            session_start();
            $_SESSION["status"] = true;
            $_SESSION["id"] = $data["id"];
            $_SESSION["username"] = $data["name"];
            $_SESSION["email"] = $data["email"];

            header("Location: ../admin.php");
        } else {
            setFlash('Password atau Username anda tidak di temukan','','danger');
            header("Location: ../login.php");
        }
    } else {
        setFlash('Password atau Username anda tidak di temukan','','danger');
        header("Location: ../login.php");
    }
}

if(isset($_POST["update_user"]))
{
    $id = $_POST["id"];
    $nama = htmlspecialchars(trim($_POST["nama"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = htmlspecialchars(trim(md5($_POST["password"])));
    if(!empty($_POST["password"]))
    {
        $sql = "UPDATE tb_user SET name = '$nama', email = '$email', password = '$password'  WHERE id = $id";
        if($conn->query($sql) == true)
        {
            setFlash('Berhasil Di Update','','success');
            header('Location: ../user.php');
            die;
        }else{
            setFlash('Gagal Di Update','','danger');
            header('Location: ../user.php');
            die;
        }
    }else{
        $sql = "UPDATE tb_user SET name = '$nama', email = '$email' WHERE id = $id";
        if($conn->query($sql) == true)
        {
            setFlash('Berhasil Di Update','','success');
            header('Location: ../user.php');
            die;
        }else{
            setFlash('Gagal Di Update','','danger');
            header('Location: ../user.php');
            die;
        }
    }
}
if(isset($_POST["simpan"]))
{
    $id = $_POST["id"];
    $nama = htmlspecialchars(trim($_POST["nama"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = htmlspecialchars(trim(md5($_POST["password"])));
    $sql = "INSERT INTO tb_user SET name = '$nama', email = '$email', password = '$password'";
    if($conn->query($sql) == true)
    {
        setFlash('Berhasil Di Tambahkan','','success');
        header('Location: ../user.php');
        die;
    }else{
        setFlash('Gagal Di Tambahkan','','danger');
        header('Location: ../user.php');
        die;
    }
}

if(isset($_GET["hapus"]))
{
    $id = $_GET["hapus"];
    $query = "DELETE FROM tb_user WHERE id  = '$id'";
    if($conn->query($query) == true)
    {
        setFlash('Berhasil Di Hapus','','success');
        header('Location: ../user.php');
        die;
    }
}

if (isset($_POST["update"])) {
    $nama = $_POST["nama"];
    $title = $_POST["title"];
    $instagram = $_POST["instagram"];
    $youtube = $_POST["youtube"];
    $wa = $_POST["whatsapp"];
    $github = $_POST["github"];
    $skill = $_POST["skill"];
    $deskripsi = $_POST["deskripsi"];
    if (!empty($_FILES["profile"]["name"])) {
        $izinkan = array('png', 'jpg', 'jpeg', 'gif');
        $nama_file = $_FILES["profile"]["name"];
        // ambil ekstensi terkahir dalam nama file
        $x = explode('.', $nama_file);
        $ekstensi = strtolower(end($x));

        // ambil nama file lama
        $old_file = $_POST["nama_file"];
        // hapus file lama
        $directory = '../file/' . $old_file;
        $file_tmp_name = $_FILES['profile']['tmp_name'];
        $new_name = uniqid() . $nama_file;
        
        if (in_array($ekstensi, $izinkan)) {
            @unlink($directory);
            move_uploaded_file($file_tmp_name, '../file/' . $new_name);
            $sql = "UPDATE tb_profile SET name = '$nama', title = '$title',instagram = '$instagram',youtube = '$youtube', whatsapp = '$wa'
               , github = '$github', skill = '$skill', deskripsi = '$deskripsi', profile = '$new_name' WHERE id = 1 
            ";
            if ($conn->query($sql) == true) {
                setFlash('Berhasil Di Update','','success');
                header('Location: ../setting.php');
                die;
            } else {
                setFlash('Gagal Di Update','','danger');
                header('Location: ../setting.php');
                die;
            }
        } else {
            setFlash('Ekstensi yang di izinkan upload PNG|JPG|JPEG|GIF','','danger');
            header('Location: ../setting.php');
            die;
        }
    } else {
        $sql = "UPDATE tb_profile SET name = '$nama', title = '$title',instagram = '$instagram',youtube = '$youtube', whatsapp = '$wa'
           , github = '$github', skill = '$skill', deskripsi = '$deskripsi' WHERE id = 1 
        ";
        if ($conn->query($sql) == true) {
            setFlash('Berhasil Di Update','','success');
            header('Location: ../setting.php');
            die;
        } else {
            setFlash('Gagal Di Update','','danger');
            header('Location: ../setting.php');
            die;

        }
    }
}
