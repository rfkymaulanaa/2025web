<?php

session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.html");
}

include "koneksi.php";


$query = "SELECT * FROM prodi";
$data = ambildata($query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>

    <h1>Tambah Data Mahasiswa </h1>

    <form action="tambahaksimahasiswa.php" method="post">
        <table>
            <tr>

                <td>NIM </td>
                <td>
                    <input style="margin-bottom: 5px;" type="text" id="nim" name="nim" required>
                </td>
            </tr>

            <tr>

                <td>Nama </td>
                <td>
                    <input style="margin-bottom: 5px;" type="text" id="nama" name="nama" required>
                </td>
            </tr>

            <tr>

                <td>Tanggal Lahir </td>
                <td>
                    <input style="margin-bottom: 5px;" type="date" id="tanggalLahir" name="tanggalLahir" required>
                </td>
            </tr>

            <tr>

                <td>No Telp </td>
                <td>
                    <input style="margin-bottom: 5px;" type="text" id="telp" name="telp" required>
                </td>
            </tr>

            <tr>

                <td>Email </td>
                <td>
                    <input style="margin-bottom: 5px;" type="email" id="email" name="email" required>
                </td>
            </tr>

            <tr style="margin-bottom: 5px;">

                <td>Prodi </td>
                <td>
                    <select name="id_prodi" id="">
                        <?php foreach ($data as $d) : ?>
                                <option value=<?php echo $d['id']; ?>> <?php echo $d['nama']; ?> </option>
                            <?php endforeach ?>
                    </select>

                </td>
            </tr>



            <tr>
                <td>
                    <button style="margin-top: 10px;" type="submit" value="Simpan"> Simpan </button>
                </td>
            </tr>

            <tr>
                <td>
                    <a href="index.php" style="margin-top: 5px;">Kembali</a>
                </td>
            </tr>

        </table>
    </form>
</body>
</html>
