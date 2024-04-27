<?php
    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "rikiyudi123";
    $database = "db_apart";

    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
?>