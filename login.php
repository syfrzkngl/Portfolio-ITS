<?php
session_start();
$servername = 'localhost';
$username = 'root'; 
$password = ''; 
$dbname = 'portfolio'; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $sandi = $_POST['sandi'];

    $sql = "SELECT * FROM pengguna WHERE email='$email'"; // run email angyg dikasi
    $result = $conn->query($sql);

    if ($result->num_rows > 0){ //cek apakah baris lebih dari nol
        $user = $result->fetch_assoc(); //deklarasi user menampilkan result dari array asosiatif

        if (password_verify($sandi, $user['sandi'])){ //cek sandinya bener gak, terus panggil user beserta sandinya
            $_SESSION['id'] = $user['id']; //simpen array di session biar ga auto logout
            $_SESSION['email'] = $user['email'];
            
            header("Location: table.php");
            exit();
        } else {
            echo "Password yang anda masukkan salah.";
        }
    } else{
        echo "Email yang anda masukkan belum terdaftar.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login.site</title>
    <link rel="stylesheet" href="login.css">                                                                                                                                                                                                                                                               
</head>
<body>
    <div class="form-box">
        <h2>Login Pengguna</h2>
        <form method="POST" action="">
            <input type="email" name="email" placeholder="Masukkan alamat email" required>
            <input type="password" name="sandi" placeholder="Masukkan kata sandi" required>
            <button type="submit">Masuk</button>
            <p>Belum memiliki akun? <span><a href="regrist.php">Regristasi sekarang.</a></span></p>
        </form>
    </div>      

</body>
</html>
