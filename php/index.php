<?php
session_start();
require 'function.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// pagination
//konfirgurasi

$jumlahDataPerHalaman = 4;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awaldata = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;


$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awaldata, $jumlahDataPerHalaman");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/script.js"></script>
</head>

<body>

    <a href="logout.php">Logout</a>

    <h1>Daftar Pemohon Paspor Hilang</h1>

    <a href="tambah.php">Tambah data mahasiswa</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="35" autofocus placeholder="Masukan Keyword Pencarian" autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari!</button>
    </form>


    <br>
    <div id="container">
        <table border="1" cellpadding="10" cellspacing="0">

            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nik</th>
                <th>Email</th>
                <th>Password</th>
                <th>tanggal</th>
                <th>Aksi</th>
                <th>Foto</th>
                <th>lihat document</th>
            </tr>


            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["nik"]; ?></td>
                    <td><?= $row["email"]; ?></td>
                    <td><?= $row["password"]; ?></td>
                    <td><?= $row["tanggal"]; ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
                        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('apakah anda yakin ingin menghapus data ini?');">hapus</a>
                    </td>
                    <td><img src="../img/<?= $row["gambar"]; ?>" width="50"></td>
                    <td><a href="dokumen.php?id=<?= $row["id"] ?>">dokumen</a></td>
                </tr>
                <?= $i++; ?>
            <?php endforeach; ?>


        </table>
        <br>
    </div>


    <!--- navigasi --->
    <?php if ($halamanAktif > 1) : ?>
        <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if ($i == $halamanAktif) : ?>
            <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color :red;">
                <?= $i; ?></a>
        <?php else : ?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($halamanAktif < $jumlahHalaman) : ?>
        <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
    <?php endif; ?>

</body>

</html>