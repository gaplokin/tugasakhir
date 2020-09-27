<?php


require '../php/function.php';


if (isset($_POST["submit"])) {


    //cek apakah data berhasil di tambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo " 
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'loginPemohon.php';
            </script>
        ";
    } else {

        // echo mysqli_error($conn);



        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'registerPemohon.php';
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
    <h1>Register</h1>

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
                <label for="gambar">gambar : </label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <br>
            <button type="submit" name="submit">Register</button>
        </ul>

    </form>
</body>

</html>