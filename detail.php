<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_GET['id'])){ //set method ambil(get) id
    $id = $_GET['id'];
    $sql = "SELECT * FROM form WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){ //cek ada usernya gak
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditersedia.";
        exit;
    }
} else{
    echo "ID tidak valid.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userdetail.site</title>
    <link rel="stylesheet" href="detail.css">
</head>
<body>
    <div class="box">
        <h1>Detail Data Pengguna</h1>
        <table>
            <tr>
                <th>ID</th>
                <td><?php echo $row['id'];?></td>
            </tr>

            <tr>
                <th>Nama</th>
                <td><?php echo $row['nama'];?></td>
            </tr>

            <tr>
                <th>Email</th>
                <td><?php echo $row['email'];?></td>
            </tr>

            <tr>
                <th>Pesan</th>
                <td><?php echo $row['pesan'];?></td>
            </tr>
        </table>
        <a href="table.php">Kembali ke tabel</a>
    </div>
</body>
</html>
<?php $conn->close(); ?>
