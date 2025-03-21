<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jadwal Imunisasi</title>
        <link rel="icon" href="./assets/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="./style/jadwal_im.css">
    </head>
    <body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="./assets/logo2.png" alt="MamaCare+ Logo">
            </div>
            <div class="menu">
                <!-- Menu items -->
            </div>
        </div>

        <!-- Main Content -->
        <div class="content">
            <!-- Informasi Tempat Check Up -->
            <div class="section">
                <h2>Informasi Tempat Check Up</h2>
                <p>Informasi terkait lokasi check-up anak Anda.</p>
                <div class="row">
                    <!-- Tempat Check-Up -->
                </div>
            </div>

            <!-- Hasil Check-Up -->
            <div class="section">
                <h2>Hasil Check Up</h2>
                <p>Berikut hasil dari check-up anak Anda.</p>
                <div class="results">
                    <!-- Hasil Check-Up -->
                </div>
            </div>

            <!-- Foto atau Dokumen -->
            <div class="section">
                <h2>Foto & Dokumen</h2>
                <p>Dokumentasi atau foto hasil check-up anak Anda.</p>
                <div class="row">
                    <!-- Placeholder Foto atau Dokumen -->
                </div>
            </div>

            <!-- Tombol Kembali -->
            <div class="section">
                <button type="button" class="back-button" onclick="window.history.back()">Kembali</button>
            </div>

            <!-- Tombol Buat Jadwal Imunisasi -->
            <div class="section">
                <form action="{{ route('jadwal-imunisasi.create') }}" method="get">
                    <button type="submit" class="create-schedule-button">Buat Jadwal Imunisasi</button>
                </form>
            </div>
        </div>
    </div>
</body>


</html>