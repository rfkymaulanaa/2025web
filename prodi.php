<?php
include "koneksi.php";

$query = "SELECT * FROM prodi";
$data = ambildata($query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPADU POLIBAN</title>
</head>
<body>
    <h1>DATA PRODI</h1>
    <br>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <th>No</th>
            <th>Nama Prodi</th>
            <th>Nama Kaprodi</th>
            <th>Jurusan</th>
        </thead>

        <tbody>
            <?php foreach ($data as $key => $value) :?>
                <tr>
                    <td>
                        <?= $key + 1?>
                    </td>
                    <td>
                        <?= $value["nama"]?>
                    </td>
                    <td>
                        <?= $value["kaprodi"]?>
                    </td>
                    <td>
                        <?= $value["jurusan"]?>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</body>
</html>