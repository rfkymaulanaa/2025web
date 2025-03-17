<?php

$servername = "localhost";
$dbname = "4ami";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$query = "SELECT * FROM mahasiswa";
$hasil = mysqli_query($conn, $query);


$data = [];
while ($baris = mysqli_fetch_assoc($hasil)) {
    $data[] = $baris;
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPADU POLIBAN</title>
</head>
<body>
    <h1>DATA MAHASISWA</h1>
    <br>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>No Telp</th>
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
                        <?= $value["telp"]?>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</body>
</html>