<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.html");
}
include "koneksi.php";

$query = "SELECT m.*, p.nama namaProdi FROM mahasiswa m JOIN prodi p ON m.id_prodi = p.id ";
$data = ambildata($query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPADU POLIBAN</title>
</head>
<style>
   a {
        background-color:rgb(40, 29, 188);
        border-radius: 10px;
        color: white;
        padding: 10px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 15px;
        margin-bottom: 10px;
    }
    a:hover {
        background-color:rgb(26, 21, 93);
    }

    thead th {
        background-color: rgb(40, 29, 188);
        color: white;
    }
</style>
<body>
    <h1>DATA MAHASISWA</h1>
    <br>
    <a href="tambahmahasiswa.php" > Tambah Mahasiswa  </a>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>No Telp</th>
            <th>Tanggal Lahir</th>
            <th>Email </th>
            <th>Aksi</th>
        </thead>

        <tbody>
            <?php foreach ($data as $key => $value) :?>
                <tr>
                    <td>
                        <?= $key + 1?>
                    </td>
                    <td>
                        <?= $value["nim"]?>
                    </td>
                    <td>
                        <?= $value["nama"]?>
                    </td>
                    <td>
                        <?= $value["namaProdi"] ?>
                    </td>
                    <td>
                        <?= $value["telp"]?>
                    </td>
                    <td>
                        <?= $value["tanggalLahir"]?>
                    </td>
                    <td>
                        <?= $value["email"]?>
                    </td>
                    <td>
                        <a  href="editmahasiswa.php?nim=<?=$value['nim']?>">Edit</a>


                        <a  href="deletemahasiswa.php?nim=<?=$value['nim']?>" 
                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</a>

                        
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
                <a style="margin-top: 10px;" href="logout.php">Keluar</a>

</body>
</html>