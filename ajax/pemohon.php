<?php
require '../php/function.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM mahasiswa
            WHERE
            nama LIKE '%$keyword%' OR
            nik LIKE '%$keyword%' OR
            email LIKE '%$keyword%' 
            ";
$mahasiswa = query($query);
?>

<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Nik</th>
        <th>Email</th>
        <th>Aksi</th>
        <th>Foto</th>
    </tr>


    <?php $i = 1; ?>
    <?php foreach ($mahasiswa as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["nik"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('apakah anda yakin ingin menghapus data ini?');">hapus</a>
            </td>
            <td><img src="../img/<?= $row["gambar"]; ?>" width="50"></td>
        </tr>
        <?= $i++; ?>
    <?php endforeach; ?>


</table>