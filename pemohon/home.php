<?php
session_start();
require '../php/function.php';
if (empty($_SESSION)) {
    header("Location: loginPemohon.php");
}

// if (!isset($_SESSION["login"])) {
//     header("Location: loginPemohon.php");
//     exit;
// }
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h1>halo, <?= $_SESSION['nama'] ?></h1>
    <br><br>
    <button>
        <a href="pasporHilang.php">Pengajuan Hilang</a>
    </button>

    <br>
    <br>
    <br>

    <a href="logoutPemohon.php">Logout</a>
</body>

</html>