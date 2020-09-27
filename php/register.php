<?php

require 'function.php';

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan');
                
                </script>";
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
    <title>halaman regitrasi</title>
    <link rel="stylesheet" href="../css/register.css">
</head>

<body>
    <!-- <div></div> -->

    <h1>Halaman Registrasi</h1>

    <form action="" method="post">

        <ul>
            <li>
                <label for="username">username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2">konfirmasi password :</label>
                <input type="password" name="password2" id="password2">
            </li>
            <br>
            <li>
                <button type="submit" name="register">register</button>
            </li>


        </ul>


    </form>

    <a href="login.php">kembali kehalaman login</a>
</body>

</html>