<?php
// Sambungkan ke database (MySQL)
$host = "localhost";
$user = "root";
$password = "";
$dbname = "mamacareplus";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Admin</title>
    <link rel="icon" href="img_navbar/Logo.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- NAVBAR -->
    <div class="navbar">
        <!-- Logo -->
        <a href="#" class="logo"><img src="img_navbar/Logo.png" alt="MamaCare+ Logo">MamaCare+</a>

        <!-- Menu Items -->
        <div class="menu">
            <a class="home" onclick="window.history.back()"><img src="img_navbar/Icon Home.png" alt="Home"> HOME</a>
            <a href="#"><img src="img_navbar/Icon Bantuan.png" alt="Bantuan"> BANTUAN</a>
            <a href="#" class="notif">
                <img src="img_navbar/Icon Notif.png" alt="Notifikasi"> NOTIF
                <span class="badge">1</span>
            </a>
            <a href="#"><img src="img_navbar/Icon Profil.png" alt="Profil Mama"> PROFIL MAMA</a>
        </div>
    </div>

    <!-- Chat Container -->
    <div class="chat-container">
        <!-- Sidebar Admin List -->
        <div class="admin-list">
            <div class="admin-item" data-admin="Admin 1">Admin 1</div>
            <div class="admin-item" data-admin="Admin 2">Admin 2</div>
            <div class="admin-item" data-admin="Admin 3">Admin 3</div>
            <div class="admin-item" data-admin="Admin 4">Admin 4</div>
        </div>

        <!-- Chat Window -->
        <div class="chat-window">
            <div class="chat-header">
                <h3 id="chat-admin-name">Pilih Admin</h3>
            </div>
            <div class="chat-body" id="chat-body">
                <!-- Pesan akan muncul di sini -->
            </div>
            <div class="chat-footer">
                <input type="text" id="message" placeholder="Ketik pesan..." />
                <button id="send-btn">
                    <img src="img_navbar/Send.png" alt="send">
                </button>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="script.js"></script>
</body>
</html>