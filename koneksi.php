<?php

$servername = "localhost";
$dbname = "4ami";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


function ambildata($query) {
    $conn = $GLOBALS['conn'];
    $hasil = mysqli_query($conn, $query);
    $data = [];
    while ($baris = mysqli_fetch_assoc($hasil)) {
        $data[] = $baris;
    }
    return $data;
    
}

function cekLogin() {
    if (!isset($_SESSION['login'])) {
    header("Location: login.html");
}
}

?>