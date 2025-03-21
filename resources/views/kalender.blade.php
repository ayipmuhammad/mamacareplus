<?php
// Ambil tahun dari parameter atau gunakan tahun saat ini sebagai default
$selectedYear = isset($_GET['year']) ? intval($_GET['year']) : date('Y');

// Tanggal awal kehamilan (default jika tidak dipilih oleh pengguna)
$tanggal_awal_kehamilan = isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d');

// Hitung usia kehamilan
$hari_sekarang = time();
$hari_awal = strtotime($tanggal_awal_kehamilan);
$usia_hari = floor(($hari_sekarang - $hari_awal) / (60 * 60 * 24));
$usia_minggu = floor($usia_hari / 7);
$trimester = ceil($usia_minggu / 13);

// Fungsi untuk menampilkan kalender
function generateCalendarGrid($month, $year, $selectedDate) {
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $firstDayOfMonth = date('w', strtotime("$year-$month-01"));
    $dayNames = ['Ming', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab']; // Nama hari

    echo "<div class='calendar-box'>";
    echo "<div class='calendar-header'>" . date('F', strtotime("$year-$month-01")) . "</div>";
    echo "<div class='calendar-content'>";
    
    // Tampilkan nama hari
    foreach ($dayNames as $day) {
        echo "<div class='calendar-day day-name'>$day</div>";
    }

    // Kosongkan sebelum tanggal 1
    for ($i = 0; $i < $firstDayOfMonth; $i++) {
        echo "<div class='calendar-day empty'></div>";
    }

    // Tampilkan hari dalam bulan
    for ($day = 1; $day <= $daysInMonth; $day++) {
        $currentDate = "$year-$month-" . str_pad($day, 2, '0', STR_PAD_LEFT);
        $activeClass = ($currentDate === $selectedDate) ? 'active' : '';
        echo "<div class='calendar-day $activeClass' onclick='selectDate(\"$currentDate\")'>$day</div>";
    }

    echo "</div></div>";
}
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kalender Kehamilan</title>
        <link rel="icon" href="img_navbar/Logo.png" type="image/x-icon">
        
        <style>
            * {
                margin: 0; /* Men-set margin default dari semua elemen */
                padding: 0; /* Men-set padding default dari semua elemen */
                box-sizing: border-box; /* Mengatur box model agar ukuran elemen termasuk padding dan border */
            }
            /* Menghapus scrollbar */
            body::-webkit-scrollbar {
                width: 0;
                height: 0;
            }
            body { 
                font-family: 'Montserrat', sans-serif; 
                background-color: #F6F6FE; 
                margin: 0; 
            }

            /* ==================== NAVBAR ======================== */
            .navbar {
                display: flex;
                align-items: center; /* Penyesuaian Posisi biar bisa pas ketengah */
                position: sticky; /* Tetap ditempat */
                top: 0; /* penempatan atas, biar pas di atas */
                width: 100%; /* ukuran lebar navbar */
                z-index: 1000; /* memastikan navbar diatas elemen lain */
                justify-content: space-between; /* memastikan jarak antar elemen sama */
                background-color: #80FF00;  
                padding: 7px 35px; /* Memberikan jarak padding atas bawah = 7px, kiri kanan = 35px */
            }
            /* logo navbar style */
            .navbar .logo {
                display: flex; /* Mengaktifkan Flexbox agar elemen anak dapat diatur lebih fleksibel */
                align-items: center; /* penempatan item di tengah secara vertikal */
                color: #FFFFFF; /* warna font */
                font-size: 18px; /* ukuran font */
                font-weight: bold; /* tebal font */
                text-decoration: none; /* menghilangkan garis bawah di teks link */
                filter: drop-shadow(2px 5px 8px rgb(0, 0, 0, 0.5)); /* Efek bayangan */
            }
            /* ukuran logo */
            .navbar .logo img {
                height: 30px; 
                margin-right: 15px;
            }
            /* Menu icon */
            .navbar .menu {
                display: flex; /* Mengaktifkan Flexbox agar elemen anak dapat diatur lebih fleksibel */
                align-items: center; /* penempatan item di tengah secara vertikal */
                gap: 20px; /* jarak antar icon */
            }
            /* keterangan icon */
            .navbar .menu a {
                color: #FAFAFA; /* font color */
                text-decoration: none; /* underline link dihilangkan */
                font-size: 14px; /* ukuran font */
                font-weight: bold; /* tebal font */
                display: flex; 
                align-items: end; /* set biar texnya di tengah secara vertikal */
            }
            .navbar .menu a img {
                height: 17px;
                margin-right: 5px;  /* jarak icon dengan keterangan */
            }
            /* badge notif */
            .navbar .menu .notif .badge {
                position: absolute;
                top: -5px;
                right: -12px;
                background-color: red; /* background badge */
                color: white; /* warna font badge */
                font-size: 10px;
                font-weight: bold;
                border-radius: 50%; /* buat bentuk bulat */
                width: 15px;
                height: 15px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .navbar .menu .notif {
                position: relative; /* penempatan badge notif */
            }

            /* ==================== SIDEBAR PERKEMBANGAN JANIN ======================== */
            .progress-bar {
                color: #000000;
                background-color: #FFFFFF;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            .progress-bar h3 {
                margin-bottom: 10px;
            }
            .bar {
                display: flex;
                flex-direction: column;
                margin-bottom: 40px;
            }
            .bar span {
                margin-bottom: 10px;
            }
            .bar .line {
                height: 20px;
                background: linear-gradient(to right, #4caf50, #ff9800, #f44336);
                border-radius: 5px;
                position: relative;
                overflow: hidden;
            }
            .bar .indicator {
                height: 100%;
                background-color: rgba(255, 255, 255, 0.7);
                position: absolute;
                top: 0;
                width: <?php echo ($usia_minggu / 40) * 100; ?>%;
            }
            .container, p {
                margin-bottom: 5px;
            }

            /* ==================== CONTAINER ======================== */
            .container { 
                display: flex; 
                justify-content: space-between; 
                padding: 20px; 
            }
            .progress-bar, .calendar { 
                background-color: #FFFFFF; 
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
                padding: 20px; 
                border-radius: 8px; 
            }
            .progress-bar { 
                width: 30%; 
            }
            .calender, h2 {
                text-align: center;
                margin-bottom: 15px;
            }
            .calendar { 
                width: 65%; 
            }

            /* ==================== KALENDER STYLES ======================== */
            .calendar-container { 
                display: grid; 
                grid-template-columns: repeat(3, 1fr); 
                gap: 15px; 
            }
            .calendar-box { 
                border: 1px solid #ddd; 
                border-radius: 5px; 
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
            }
            .calendar-header { 
                text-align: center; 
                background: #80FF00; 
                color: #fff; 
                padding: 10px; 
                font-weight: bold; 
            }
            .calendar-content { 
                display: grid; 
                grid-template-columns: repeat(7, 1fr); 
            }
            .calendar-day { 
                text-align: center; 
                padding: 5px; 
                border: 1px solid #f0f0f0; 
                font-size: 12px; 
                cursor: pointer; 
            }
            .calendar-day.day-name { 
                background-color: #1B2769; 
                color: #FFFFFF;
            }
            .calendar-day.active { 
                background-color: #80FF00; 
                color: #FFFFFF; 
            }

            /* ==================== TAHUN SELECTOR ======================== */
            .year-selector { 
                display: flex; 
                font-size: 14px;
                justify-content: center; 
                gap: 5px; 
                margin-bottom: 20px;
            }
            .year-selector span {
                cursor: pointer; 
                padding: 5px 12.59px; 
                background-color: #80FF00; 
                color: #FFFFFF; 
                border-radius: 5px; 
            }
            .year-selector span.active { 
                background-color: #1B2769; 
            }

            .home:hover {
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <!-- NAVBAR -->
        <div class="navbar">
            <!-- Logo -->
            <a href="#" class="logo"><img src="img_navbar/Logo.png" alt="MamaCare+ Logo">MamaCare+</a>

            <!-- Menu Items -->
            <div class="menu">
            <a class="home" href="{{route ("home")}}"><img src="img_navbar/Icon Home.png" alt="Home"> HOME</a>
                <a href="#"><img src="img_navbar/Icon Bantuan.png" alt="Bantuan"> BANTUAN</a>
                <a href="#" class="notif">
                    <img src="img_navbar/Icon Notif.png" alt="Notifikasi"> NOTIF
                    <span class="badge">1</span>
                </a>
               
            </div>
        </div>

        <div class="container">
            <!-- Progress Bar -->
            <!-- Perkembangan Janin -->
            <div class="progress-bar">
                <h2>Usia Kehamilan</h2>
                <h3>Trimester</h3>
                <div class="bar">
                    <span>1 - 3</span>
                    <div class="line">
                        <div class="indicator" style="width: <?php echo ($trimester / 3) * 100; ?>%;"></div>
                    </div>
                </div>
                <h3>Week</h3>
                <div class="bar">
                    <span>1 - 40</span>
                    <div class="line">
                        <div class="indicator"></div>
                    </div>
                </div>
                <p>Usia: <?php echo $usia_minggu; ?> minggu</p>
                <p>Trimester: <?php echo $trimester; ?></p>
                <p>Tanggal Awal Kehamilan: <?php echo $tanggal_awal_kehamilan; ?></p>
            </div>

            <!-- Kalender -->
            <div class="calendar">
                <h2>Kalender Kehamilan</h2>
                <!-- Year Selector -->
                <div class="year-selector">
                    <span onclick="changeYear(<?php echo $selectedYear - 1; ?>)">«</span>
                    <?php for ($y = 2020; $y <= 2030; $y++): ?>
                        <span class="<?php echo ($y == $selectedYear) ? 'active' : ''; ?>" onclick="changeYear(<?php echo $y; ?>)"><?php echo $y; ?></span>
                    <?php endfor; ?>
                    <span onclick="changeYear(<?php echo $selectedYear + 1; ?>)">»</span>
                </div>

                <!-- Kalender -->
                <div class="calendar-container">
                    <?php
                    for ($month = 1; $month <= 12; $month++) {
                        generateCalendarGrid($month, $selectedYear, $tanggal_awal_kehamilan);
                    }
                    ?>
                </div>
            </div>
        </div>

        <script>
            // Fungsi ganti tahun
            function changeYear(year) {
                window.location.href = `?year=${year}&start_date=<?php echo $tanggal_awal_kehamilan; ?>`;
            }

            // Fungsi memilih tanggal awal kehamilan
            function selectDate(date) {
                window.location.href = `?year=<?php echo $selectedYear; ?>&start_date=${date}`;
            }
        </script>
    </body>
</html>