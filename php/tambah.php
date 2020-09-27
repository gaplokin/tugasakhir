<?php

session_start();
require 'function.php';


if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}



if (isset($_POST["submit"])) {



    //cek apakah data berhasil di tambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo " 
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'index.php';
            </script>
        
        ";
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>

<body>
    <h1>Tambah Data</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">nama : </label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="nik">nik : </label>
                <input type="text" name="nik" id="nik" required>
            </li>
            <li>
                <label for="email">email : </label>
                <input type="text" name="email" id="email" required>
            </li>
            <li>
                <label for="password">password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="tanggal">tanggal :</label>
                <input type="date" name="tanggal" id="tanggal" min="2020-01-01" max="2025-12-30">
            </li>
            <li>
                <label for="gambar">gambar : </label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <br>
            <button type="submit" name="submit">Tambah Data</button>
        </ul>

    </form>
</body>

</html>