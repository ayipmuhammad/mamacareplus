<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jadwal Check-Up</title>
        <link rel="icon" href="./assets/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="./style/jadwal_cu.css">
    </head>
    <body>
        <div class="container">
            <!-- Sidebar -->
            <div class="sidebar">
                <div class="logo">
                    <img src="./assets/logo2.png" alt="MamaCare+ Logo">
                </div>
                <div class="menu">
                    <!-- Tombol Tambah Data -->
                    <button class="add-button" onclick="window.location.href='tambah_data.php'">Tambah Data</button>
                </div>
            </div>

            <!-- Main Content -->
            <div class="content">
                <!-- Informasi Tempat Check-Up -->
                <div class="section">
                    <h2 class="section-title">Informasi Tempat Check-Up</h2>
                    <p class="section-description">{{ Auth::user()->name }}</p>
                    <p class="section-description">Informasi mengenai lokasi check-up ibu:</p>
                    <div class="row">
                        <!-- Data akan diisi melalui PHP -->
                        <?php
                        // Contoh: Ambil data dari database
                        // $data_tempat = []; // Hasil query database
                        if (!empty($data_tempat)) {
                            foreach ($data_tempat as $tempat) {
                                echo "
                                    <div class='info-box'>
                                        <h3>{$tempat['nama']}</h3>
                                        <p>Alamat: {$tempat['alamat']}</p>
                                    </div>
                                ";
                            }
                        } else {
                            echo "<p>Belum ada data tempat check-up.</p>";
                        }
                        ?>
                    </div>
                </div>

                <!-- Jadwal Check-Up -->
                <div class="section">
                    <h2 class="section-title">Jadwal Check-Up</h2>
                    <p class="section-description">Berikut adalah jadwal check-up yang telah dijadwalkan:</p>
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Lokasi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Contoh: Ambil data jadwal dari database
                            // $jadwal_checkup = []; // Hasil query database
                            if (!empty($jadwal_checkup)) {
                                foreach ($jadwal_checkup as $jadwal) {
                                    echo "
                                        <tr>
                                            <td>{$jadwal['tanggal']}</td>
                                            <td>{$jadwal['waktu']}</td>
                                            <td>{$jadwal['lokasi']}</td>
                                            <td class='status ".($jadwal['status'] == 'confirmed' ? 'confirmed' : 'pending')."'>
                                                ".($jadwal['status'] == 'confirmed' ? 'Terkonfirmasi' : 'Menunggu')."
                                            </td>
                                        </tr>
                                    ";
                                }
                            } else {
                                echo "<tr><td colspan='4'>Belum ada jadwal check-up.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Foto atau Dokumen -->
                <div class="section">
                    <h2 class="section-title">Foto & Dokumen</h2>
                    <p class="section-description">Dokumentasi atau file terkait check-up ibu:</p>
                    <div class="row">
                        <!-- Data akan diisi melalui PHP -->
                        <?php
                        // Contoh: Ambil data dokumen dari database
                        // $foto_dokumen = []; // Hasil query database
                        if (!empty($foto_dokumen)) {
                            foreach ($foto_dokumen as $dokumen) {
                                echo "<div class='placeholder-box'>{$dokumen['nama_file']}</div>";
                            }
                        } else {
                            echo "<p>Belum ada foto atau dokumen.</p>";
                        }
                        ?>
                    </div>
                </div>

                <!-- Tombol Kembali -->
                <div class="section">
                    <button type="button" class="back-button" onclick="window.history.back()">Kembali</button>
                </div>
            </div>
        </div>
    </body>
</html>
