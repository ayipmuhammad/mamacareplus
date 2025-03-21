<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "mamacareplus";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil pesan
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['admin'])) {
    $admin = $_GET['admin'];
    $query = "SELECT * FROM chat WHERE admin = '$admin' ORDER BY timestamp ASC";
    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>{$row['sender']}:</strong> {$row['message']}</p>";
    }
    exit;
}

// Simpan pesan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin = $_POST['admin'];
    $message = $_POST['message'];
    $sender = "User"; // Anggap pengirimnya user

    $query = "INSERT INTO chat (admin, sender, message) VALUES ('$admin', '$sender', '$message')";
    $conn->query($query);
    exit;
}
?>