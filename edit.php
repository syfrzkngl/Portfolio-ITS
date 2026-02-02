<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_GET['id'])){   
    $id = $_GET['id'];      
    $sql = "SELECT * FROM form WHERE id = $id"; 
    $result = $conn->query($sql); //mengambil hasil(result) dengan mengubungkan(conn) ke kueri sql 

    if($result->num_rows > 0){ //hitung baris kueri apakah lebih dr 0, jika iya berarti data ditemukan
        $row = $result->fetch_assoc(); //data ditemukan, jadi ambil array asosiatif(kata kunci) sebaris dan disimpan ke $row
    } else{
        echo "Yah, maaf data tidak ditemukan.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edituser.site</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <?php
    if (isset($row)): //jika row sudah berisi array
    ?>

    <div class="edit">
        <div class="form-title">
            <h1>Ubah Data Pengguna</h1>
        </div>
        <div class="form-page">
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id'];?>"> <!-- menampilkan baris sesuai id, tapi hidden !-->
                <div class="form-box">
                    <input type="text" id="nama" name="nama" value="<?php echo $row['nama'];?>"> <!-- nampilin nama sesuai baris -->
                    <input type="email" id="email" name="email" value="<?php echo $row['email'];?>">
                    <textarea id="pesan" name="pesan"><?php echo $row['pesan'];?></textarea>
                    <button type="submit">Perbarui</button>
                </div>
            </form>
        </div>
    </div>

    <?php 
    else: //jika id tidak ditemukan
    ?>
    
    <p>Data tidak ditemukan.</p>

    <?php
    endif; //berentiin if
    ?>
</body>
</html>
