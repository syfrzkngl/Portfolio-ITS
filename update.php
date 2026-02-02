<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['id'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    $sql = "UPDATE form SET nama='$nama', email='$email', pesan='$pesan' WHERE id=$id";

    if ($conn->query($sql) == TRUE){
        echo "Data berhasil diperbarui.
             <br>
             <a href='table.php' class='btn'>Lihat hasil</a>";
    } else{
        echo $conn->error;
    }
}

$conn->close();
?>

<style>
    *{
        background-color: white;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        text-align: center;
        padding: 50px;
    }

    .btn{
        background-color:#460404;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
        display: inline-block;
        margin-top: 20px;
    }

    .btn:hover{
        background-color:rgb(0, 0, 0);
    }
</style>
