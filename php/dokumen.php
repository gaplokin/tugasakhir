<?php

require 'function.php';
$queryGetDokumen = "SELECT * FROM dokumen where user_id=" . $_GET['id'];
$resultDokumen = query($queryGetDokumen);
// echo '<pre>';
// print_r($resultDokumen);
// die();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body>
    <h1>dokumen pemohon</h1>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>#</th>
            <th>Tanggal</th>
            <th>Shift</th>
            <th>E-Ktp</th>
            <th>Kartu Keluarga</th>
            <th>Akte Kelahiran</th>
            <th>Paspor Lama</th>
            <th>Surat Pernyataan</th>
        </tr>


        <?php $i = 1; ?>
        <?php foreach ($resultDokumen as $row) { ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["tanggal"]; ?></td>
                <td><?= $row["shift"]; ?></td>
                <td><img width="150" src="../img/<?= $row["ektp"]; ?>" alt=""></td>
                <td><img width="150" src="../img/<?= $row["kk"]; ?>" alt=""></td>
                <td><img width="150" src="../img/<?= $row["akte"]; ?>" alt=""></td>
                <td><img width="150" src="../img/<?= $row["pasporlama"]; ?>" alt=""></td>
                <td><img width="150" src="../img/<?= $row["pernyataan"]; ?>" alt=""></td>
            </tr>
            <?php $i++; ?>
        <?php } ?>
    </table>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>