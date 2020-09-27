<?php
session_start();
require '../php/function.php';

//cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //ambil email berdasarkan id
    $result = mysqli_query($conn, "SELECT email FROM mahasiswa WHERE 
		id = $id");
    $row = mysqli_fetch_assoc($result);

    //cek cookie dan email
    if ($key === hash('sha256', $row['email'])) {
        $_SESSION['login'] = true;
    }
}



if (isset($_SESSION["login"])) {
    header("Location: home.php");
    exit;
}





if (isset($_POST["login"])) {


    $email = $_POST["email"];
    $password = $_POST["password"];


    $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE 
        email = '$email'");


    //cek email
    if (mysqli_num_rows($result) == 1) {

        // salah disini
        // cek passwordnya
        $row = mysqli_fetch_assoc($result);

        if ($password == $row["password"]) {

            // set session
            $_SESSION["login"] = true;
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["nama"] = $row["nama"];

            //cek remember me
            if (isset($_POST['remember'])) {

                //buat cookie
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['email']), time() + 60);
            }
            header("Location: home.php");
            exit;
        }
        return $row;
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <!-- <div></div> -->

    <h1>halaman login</h1>

    <?php if (isset($error)) : ?>
        <p style="color: red; font-style: italic;">username atau password salah</p>
    <?php endif;  ?>

    <form action="" method="post">


        <ul>
            <li>
                <label for="email">Email :</label><br>
                <input type="text" name="email" id="email">
            </li>
            <li>
                <label for="password">Password :</label><br>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">remember me</label>
            </li>
            <br>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
            <br>
            <a href="registerPemohon.php">DAFTAR</a>

        </ul>


    </form>
</body>

</html>