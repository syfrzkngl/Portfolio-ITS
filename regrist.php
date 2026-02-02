<?php
$servername = 'localhost';
$username = 'root'; 
$password = ''; 
$dbname = 'portfolio';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $sandi = password_hash($_POST['sandi'], PASSWORD_DEFAULT); //ganti pw jadi string acak dengan algoritma default hash
    $sql = "INSERT INTO pengguna (nama, email, telp, sandi) VALUES ('$nama', '$email', '$telp', '$sandi')";

    $sql_check = "SELECT * FROM pengguna WHERE email = '$email'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0){ //cek ada usernya gak
        echo "<div class='notif'>
              Akun anda sudah terdaftar. Silahkan gunakan email lain.
              <br>
              atau
              <br>
              <a href='login.php'>Login</a>
              </div> ";
    } else{
        $sql = "INSERT INTO pengguna (nama, email, telp, sandi) VALUES ('$nama', '$email', '$telp', '$sandi')";
    }

    if ($conn->query($sql) == TRUE){ //cek koneksi ke kueri sql
        echo "<div class='notif'>
              Registrasi berhasil!
              <br>
              <a href='login.php'>Login sekarang</a>
              </div>";
    } else{
        echo $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>regrist.site</title>
    <link rel="stylesheet" href="regrist.css?v=2.0">
</head>
<body>
    <div class="form-box">
        <h2>Registrasi Pengguna</h2>
        <form method="POST" action="">
            <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" required>
            <input type="email" name="email" placeholder="Masukkan alamat email" required>
            <input type="text" name="telp" placeholder="Masukkan nomor telepon aktif" required>
            <input type="password" name="sandi" placeholder="Masukkan kata sandi" required>
            <button type="submit">Daftar</button>
            <p>Sudah memiliki akun? <span><a href="login.php">Login.</a></span></p>
        </form>
    </div>
</body>
</html>
