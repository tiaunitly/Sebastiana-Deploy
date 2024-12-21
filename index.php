<?php
$host = 'db';
$port = 5432;
$dbname = 'mydb';
$user = 'myuser';
$password = 'mypassword';

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";

try {
    $pdo = new PDO($dsn, $user, $password);
    // echo "<h2>Berhasil terhubung ke PostgreSQL!</h2>";

    // AMbil data dari tabel mahasiswa
    $query = $pdo->query("SELECT nama, nim, prodi FROM mahasiswa");
    $result = $query->fetchALL(PDO:: FETCH_ASSOC);

    echo "<h3>Data Mahasiswa:</h3>";
    foreach ( $result as  $row) {
        echo "Nama: " . htmlspecialchars( $row['nama']) . "<br>";
        echo "NIM: " . htmlspecialchars( $row['nim']) . "<br><br>";
        echo "Prodi: " . htmlspecialchars( $row['prodi']) . "<br><br><br>";
    }
} catch (PDOException $e) {
    echo("Koneksi gagal: " . $e->getMessage());
}