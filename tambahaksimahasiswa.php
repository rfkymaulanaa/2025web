<?php

include "koneksi.php";

$nim = $_POST['nim'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$tanggalLahir = $_POST['tanggalLahir'];
$telp = $_POST['telp'];
$email = $_POST['email'];
$id_prodi = $_POST['id_prodi'];


$namafile = $_FILES['foto']['name'];
$tmpname = $_FILES['foto']['tmp_name'];

$ekstensiFoto = explode('.', $namafile);
$ekstensiFoto = strtolower(end($ekstensiFoto));

$namaFileBaru = $nim;
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensiFoto;

move_uploaded_file($tmpname, "assets/img/" . $namaFileBaru);

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO mahasiswa (nim, password, nama, tanggalLahir, telp, email, id_prodi, foto)
         VALUES ('$nim','$hashedPassword', '$nama', '$tanggalLahir', '$telp', '$email', '$id_prodi', '$namaFileBaru')";



mysqli_query($conn, $query);

header("Location: index.php");

?>