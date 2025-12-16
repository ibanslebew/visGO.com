<?php
$host = "localhost";
$user = "root";      // default Laragon
$pass = "";          // default Laragon kosong
$db   = "algo_db";   // database kamu

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
