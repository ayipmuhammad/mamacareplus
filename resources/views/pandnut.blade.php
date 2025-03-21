<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panduan Pemenuhan Nutrisi</title>
        <link rel="icon" href="./assets/logo.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./style/navbar.css">
        <link rel="stylesheet" href="./style/body.css">
        <link rel="stylesheet" href="./style/pandnut.css">
        <link rel="stylesheet" href="./style/footer.css">

        <style>
            /* Reklame */
            .reklame {
                background-image: url("./assets/reklame3.png");
                background-size: cover;
                background-position: top center;
                background-repeat: no-repeat;
                height: 80vh; /* Dikurangi agar muat di layar */
                display: flex;
                justify-content: flex-end;
                align-items: center;
                padding: 30px;
            }
        </style>
    </head>
    <body>
        <!-- NAVBAR -->
        <div class="navbar">
            <!-- Logo -->
            <a href="#" class="logo"><img src="./assets/logo.png" alt="MamaCare+ Logo">MamaCare+</a>

            <!-- Menu Items -->
            <div class="menu">
                <a href="{{route('home')}}"><img src="./assets/img_navbar/icon_home.png" alt="Home"> HOME</a>
                <a href="#panduan-ibu"><img src="./assets/img_navbar/icon_footer.png" alt="Footer"> PANDUAN IBU</a>
                <a href="./bantuan.php"><img src="./assets/img_navbar/icon_bantuan.png" alt="Bantuan"> BANTUAN</a>
            </div>
        </div>

        <!-- REKLAME -->
        <section class="reklame"></section>

        <!-- PANDUAN IBU -->
        <div class="container" id="panduan-ibu">
            <div class="header">
                <img src="./assets/image.png" alt="Pedoman Gizi Seimbang">
                <div>
                    <h1 class="title">Pedoman Gizi Seimbang Ibu Hamil Dan Menyusui</h1>
                    <p>Kementerian Kesehatan RI, 2021</p>
                </div>
            </div>

            <div class="details">
                <div>
                    <span>Penanggung Jawab:</span>
                    <span>Kementerian Kesehatan</span>
                </div>
                <div>
                    <span>Tajuk Pengarang:</span>
                    <span>Direktorat Jenderal Kesehatan Masyarakat</span>
                </div>
                <div>
                    <span>Tempat Terbit:</span>
                    <span>Jakarta</span>
                </div>
                <div>
                    <span>Tahun Terbit:</span>
                    <span>2021</span>
                </div>
                <div>
                    <span>Jumlah Halaman:</span>
                    <span>174</span>
                </div>
                <div>
                    <span>ISBN:</span>
                    <span>978-623-301-143-3</span>
                </div>
            </div>

            <div class="button-container">
                <a href="https://drive.google.com/file/d/1f0GKY_M3DOX5ENJ2cZG7XRzZ4cFAfvyI/view">LIHAT PDF</a>
            </div>
        </div>

        
    </body>
</html>