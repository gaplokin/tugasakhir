<?php

session_start();
require 'function.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}




//ambil data di URL
$id = $_GET["id"];

// query data berdasarkan id
$pmh = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

//cek apakah tombol submit sudah di tekan atau blm
if (isset($_POST["submit"])) {


    //cek apakah data berhasil diubah
    if (ubah($_POST) > 0) {
        echo " 
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
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
    <title>Ubah Data</title>
</head>

<body>
    <h1>Ubah Data</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $pmh["id"]; ?>">
        <input type="hidden" name="gambarlama" value="<?= $pmh["gambar"]; ?>">
        <ul>
            <li>
                <label for="nama">nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $pmh["nama"]; ?>">
            </li>
            <li>
                <label for="nik">nik : </label>
                <input type="text" name="nik" id="nik" required value="<?= $pmh["nik"]; ?>">
            </li>
            <li>
                <label for=" email">email : </label>
                <input type="text" name="email" id="email" required value="<?= $pmh["email"]; ?>">
            </li>
            <li>
                <label for="tanggal">tanggal :</label>
                <input type="date" name="tanggal" id="tanggal" min="2020-01-01" max="2025-12-30" required value="<?= $pmh["tanggal"]; ?>">
            </li>
            <br>
            <li>
                <label for="gambar">gambar : </label>
                <img src="../img/<?= $pmh['gambar']; ?>" width="80"><br><br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <br>
            <button type=" submit" name="submit">Ubah Data</button>
        </ul>

    </form>
</body>

</html>