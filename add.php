<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['submit'])){   //cek data udah keisi belom
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    if($nama && $email && $pesan){ //&& bernilai true jika tidak null(kosong)
        $sql = "INSERT INTO form (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
        if ($conn->query($sql)){
            echo "Pengguna berhasil ditambahkan!";
            header("Location: table.php");
            exit();
        } else{
            echo "Yah, maaf data yang anda masukkan tidak dapat ditambahkan. ".$conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adduser.site</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <div class="add">
        <div class="add-title">
            <h1>Tambah Pengguna</h1>
        </div>
        <div class="form-page">
            <form action="#" method="POST">
                <div class="form-box">
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama" required>
                    <input type="email" id="email" name="email" placeholder="Masukkan alamat email" required>
                    <textarea id="pesan" name="pesan" placeholder="Ketikkan pesan yang ingin disampaikan" required></textarea>
                    <input type="submit" name="submit" value="Tambahkan">
                </div>
            </form>
        </div>
    </div>
</body>
</html>