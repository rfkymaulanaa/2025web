<?php 
include "koneksi.php";

$query = "DELETE FROM mahasiswa WHERE nim = '$_GET[nim]' ";

mysqli_query($conn, $query);

header("Location: index.php");



?>