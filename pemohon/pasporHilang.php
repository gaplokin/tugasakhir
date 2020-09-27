<?php
session_start();
require '../php/function.php';
if (empty($_SESSION)) {
    header("Location: loginPemohon.php");
}

if (isset($_POST["submit"])) {

	//print_r($_POST);
	//die();
    //cek apakah data berhasil di tambahkan atau tidak
    $result = document($_POST);
    if ($result == "full") {
        echo " 
            <script>
                alert('Penuh, coba hari lain.');
            </script>
        ";
    }
    if ($result > 0) {
        echo " 
            <script>
                alert('dokument baru berhasil ditambahkan');
            </script>
        ";
    } else {

        echo mysqli_error($conn);
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pengajuan hilang</title>
</head>

<body>
    <h1>Upload Document</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <li>
            <label for="tanggal">Tanggal : </label>
            <input type="date" name="tanggal" id="tanggal">
        </li>
        <br>
		
		<li>
            <label for="shift">shift : </label>
            <select name="shift" id="shift">
			  <option value="1">Shift 1 - 08.00</option>
			  <option value="2">Shift 2 - 10.00</option>
			  <option value="3">Shift 3 - 13.00</option>
			</select>
        </li>
        <br>
		
		<li>
            <label for="ektp">e-ktp : </label>
            <input type="file" name="ektp" id="ektp">
        </li>
        <br>
		
        <li>
            <label for="kk">kartu keluarga : </label>
            <input type="file" name="kk" id="kk">
        </li>
        <br>
        <li>
            <label for="akte">akte kelahiran : </label>
            <input type="file" name="akte" id="akte">
        </li>
        <br>
        <li>
            <label for="pasporlama">paspor Lama : </label>
            <input type="file" name="pasporlama" id="pasporlama">
        </li>
        <br>
        <li>
            <label for="pernyataan">surat pernyataan : </label>
            <input type="file" name="pernyataan" id="pernyataan">
        </li>

        <br>
        <br>
        <button type="submit" name="submit">Upload Document</button>


    </form>
</body>

</html>