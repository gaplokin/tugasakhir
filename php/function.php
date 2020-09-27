<?php
// session_start();
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "imigrasi");


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}


//uplaod dokument
function document($data)
{
    global $conn;

    //cek username sudah ada atau belum
    // $result = mysqli_query($conn, "SELECT id FROM dokumen 
    // WHERE username = '$username' ");

    $ektp = updoc('ektp');
    if (!$ektp) {
        return false;
    }
    $kk = updoc('kk');
    if (!$kk) {
        return false;
    }
    $akte = updoc('akte');
    if (!$akte) {
        return false;
    }
    $pasporlama = updoc('pasporlama');
    if (!$pasporlama) {
        return false;
    }
    $pernyataan = updoc('pernyataan');
    if (!$pernyataan) {
        return false;
    }

    // $query = "INSERT INTO dokumen
    //             VALUES
    //             ('', '$ektp', '$kk', '$akte', '$pasporlama', '$pernyataan')
    //             ";

    $tanggal = $data['tanggal'];
    $shift = $data['shift'];
    $user_id = $_SESSION['user_id'];

    $queryCekTanggal = "SELECT * FROM dokumen where tanggal = '" . $tanggal . "'";
    $hasilCekTanggal = mysqli_query($conn, $queryCekTanggal);
    $totalRow = mysqli_num_rows($hasilCekTanggal);

    if ($totalRow > 8) {
        return "full";
    } else {
        $resultInsert = mysqli_query($conn, "INSERT INTO dokumen VALUES('', '$user_id', '$tanggal', '$shift', '$ektp', '$kk', '$akte', '$pasporlama', '$pernyataan')");
        return 1;
    }
}

function updoc($tipe)
{
    if ($tipe == "ektp") {
        $namaFile = $_FILES['ektp']['name'];
        $ukuranFile = $_FILES['ektp']['size'];
        $error = $_FILES['ektp']['error'];
        $tmpName = $_FILES['ektp']['tmp_name'];
    }

    if ($tipe == "kk") {
        $namaFile = $_FILES['kk']['name'];
        $ukuranFile = $_FILES['kk']['size'];
        $error = $_FILES['kk']['error'];
        $tmpName = $_FILES['kk']['tmp_name'];
    }

    if ($tipe == "akte") {
        $namaFile = $_FILES['akte']['name'];
        $ukuranFile = $_FILES['akte']['size'];
        $error = $_FILES['akte']['error'];
        $tmpName = $_FILES['akte']['tmp_name'];
    }

    if ($tipe == "pasporlama") {
        $namaFile = $_FILES['pasporlama']['name'];
        $ukuranFile = $_FILES['pasporlama']['size'];
        $error = $_FILES['pasporlama']['error'];
        $tmpName = $_FILES['pasporlama']['tmp_name'];
    }

    if ($tipe == "pernyataan") {
        $namaFile = $_FILES['pernyataan']['name'];
        $ukuranFile = $_FILES['pernyataan']['size'];
        $error = $_FILES['pernyataan']['error'];
        $tmpName = $_FILES['pernyataan']['tmp_name'];
    }



    //cek apakah tidak ada gambar yang d uplod
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
                </script>";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('format gambar salah!');
                </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
                </script>";
        return false;
    }


    //lolos pengecekan gambar siap di upload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

    return $namaFileBaru;
}










function tambah($data)
{
    global $conn;


    $nama = htmlspecialchars($data["nama"]);
    $nik = htmlspecialchars($data["nik"]);
    $email = htmlspecialchars($data["email"]);
    $password = htmlspecialchars($data["password"]);
    $tanggal = htmlspecialchars($data["tanggal"]);

    $result = mysqli_query($conn, "SELECT email FROM mahasiswa 
    WHERE email = '$email' ");

    if (mysqli_fetch_row($result)) {
        echo "<script>
                alert('email sudah terdaftar!');
                </script>";
        return false;
    }

    //upload gmbr
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO mahasiswa
                VALUES
                ('', '$nama', '$nik', '$email', '$password', '$tanggal', '$gambar')
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar yang d uplod
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
                </script>";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('format gambar salah!');
                </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
                </script>";
        return false;
    }


    //lolos pengecekan gambar siap di upload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

    return $namaFileBaru;
}


function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}


function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nik = htmlspecialchars($data["nik"]);
    $email = htmlspecialchars($data["email"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    //cek apakah user pilih gmbar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }


    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                nik = '$nik',
                email = '$email',
                tanggal = '$tanggal',
                gambar = '$gambar'
                WHERE id = $id
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa
            WHERE
            nama LIKE '%$keyword%' OR
            nik LIKE '%$keyword%' OR
            email LIKE '%$keyword%' 
            ";
    return query($query);
}









function registrasi($data)
{
    global $conn;

    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user 
    WHERE username = '$username' ");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar!');
                </script>";
        return false;
    }


    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
                </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    //tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
