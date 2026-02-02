<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    $sql = "INSERT INTO form (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";

    if ($conn->query($sql)){ 
        echo "Pesan anda berhasil dikirimkan."; 
    } else {
        echo "Yah, maaf pesan tidak dapat dikirimkan, karena ".$sql.$conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form.site</title>
    <link rel="stylesheet" href="hire.css">
</head>
<body>
    <div class="hire">
        <div class="form-title">
            <h1>Hubungi Saya</h1>
        </div>
        <div class="form-page">
            <form id="popup" method="POST">
                <div class="form-box">
                    <div class="form-option">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama" required>
                    </div>
                    <div class="form-option">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan alamat email" required>
                    </div>
                </div>
                <label for="pesan">Pesan</label>
                <textarea id="pesan" name="pesan" placeholder="Ketikkan pesan yang ingin disampaikan" required></textarea>
                <input type="submit" value="Kirim">
            </form>
        </div>
    </div>

    <script>
        document.getElementById('popup').addEventListener('submit', function(event){ //ambil data dari pop up, terus cek kegiatanya(fungsi pake event)
        event.preventDefault(); //mencegah(prevent) atau ngasi jeda sebelum ke kode yang ada selanjutnya(default)

        var nama = document.getElementById('nama').value; // ambil data dari user
        var email = document.getElementById('email').value;
        var pesan = document.getElementById('pesan').value;

        alert('Apakah anda sudah yakin dengan data yang telah dimasukkan?\n \nNama: ' +nama + '\nAlamat email: ' +email + '\nPesan: ' +pesan);
        this.submit();
        });
    </script>
</body>
</html>