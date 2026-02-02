<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

$conn = new mysqli($servername, $username, $password, $dbname);

$search = ''; //deklarasi syntax search
if (isset($_GET['search'])){
    $search = $_GET['search'];
}

$sql = "SELECT * FROM form WHERE nama LIKE '%$search%' OR email LIKE '%$search%'";
$result = $conn->query($sql);

if (isset($_GET['delete'])){  
    $id = $_GET['delete'];
    $sql = "DELETE FROM form WHERE id = $id";
    if ($conn->query($sql) == TRUE){
        echo "Data berhasil dihapus!";
    } else {
        echo "Yah, maaf data tidak bisa dihapus, karena ".$conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>usertable.site</title>
    <link rel="stylesheet" href="table.css">
</head>
<body>
    <div class="table-title">
        <h1>Tabel Data Pengguna</h1>
    </div>

    <form action="" method="GET">
        <input type="text" id="search" name="search" value="<?php echo htmlspecialchars($search);?>" placeholder="Cari data">
        <button type="submit">Cari</button>
    </form>

    <div class="table-option">
        <?php
        if (!isset($_SESSION['id'])): ?> <!-- langsung buka tutup biar mudah styling -->
            <a href="login.php">Login</a>
        <?php else: ?>
            <a href="add.php">Tambah data</a>
            <a href="logout.php">Logout</a>
        <?php endif; ?>

    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Pesan</th>
            <th>Aksi</th>
        </tr>

        <?php
        if ($result->num_rows > 0){ //cek apakah baris lebih dari nol
            while ($row = $result->fetch_assoc()){ //cek baris untuk ambil hasil dari array asosiatif
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['nama'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['pesan'] . "</td>
                        <td>";

            if (isset($_SESSION['id'])){
                echo "<a href='detail.php?id=" . $row['id'] . "' class='button'>detail</a>
                      <a href='edit.php?id=" . $row['id'] . "' class='button'>Ubah</a>
                      <a href='?delete=" . $row['id'] . "' onclick='return confirm(\"Apakah anda yakin ingin menghapus data ini?\")' class='button'>Hapus</a>
                      </td> 
                      </tr>";
            } else{
                echo "<p>Login untuk edit atau hapus data</p>
                      <a href='detail.php?id=" . $row['id'] . "' class='button'>detail</a>
                      </td> 
                      </tr>";
                }
            }
        } else{
            echo "<tr><td colspan='5'>Yah, maaf data yang anda cari tidak tersedia.</td></tr>";
        }

        $conn->close(); 
        ?>
    </table>
</body>
</html>
