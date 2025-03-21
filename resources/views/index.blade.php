<?php
    $backgroundImage= "url(./assets/img_footer/footer.png)";
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MamaCare+</title>
        <link rel="icon" href="./assets/logo.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./style/navbar.css">
        <link rel="stylesheet" href="./style/body.css">
        <link rel="stylesheet" href="./style/artikel.css">
        <link rel="stylesheet" href="./style/faq.css">
        <link rel="stylesheet" href="./style/footer.css">

        <style>
            /* Tombol Get Started di Header */
            .btn-get-started {
                background-color: #1B2769; /* Hijau cerah sesuai gambar */
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 25px; /* Membuat sudut bulat */
                font-weight: 600;
                cursor: pointer;
                text-align: center;
                transition: background-color 0.3s ease, transform 0.2s ease; /* Animasi saat hover */
            }

            /* Efek Hover */
            .btn-get-started:hover {
                background-color: #009900; /* Warna lebih gelap saat di-hover */
                transform: scale(1.05); /* Membesar sedikit saat hover */
            }

            .reklame {
                background-image: url("./assets/reklame1.png");
                background-size: cover;
                background-position: top center;
                background-repeat: no-repeat;
                height: 75vh; /* Dikurangi agar muat di layar */
                display: flex;
                justify-content: flex-end;
                align-items: center;
                padding: 30px;
            }

            .reklame-content {
                text-align: left;
                max-width: 100%;
                color: #F5F5F5;
            }

            /* ==================== ISI ======================== */
            .about {
                padding: 25px; /* setingan padding */
                text-align: center; /* setingan untuk teks supaya berada di tengah*/
                background-color: #FFFFFF;
            }

            /* Garis separator di atas Tulisan MyCarePlus */
            .separator {
                width: 250px; /* Memperpanjang garis */
                height: 8px; /* Menebalkan garis */
                background-color: #1B2769; /* Warna garis */
                margin: 0 auto 25px; /* Agar tetap di tengah */
                border-radius: 25px; /* kelengkungan sisi garis */
            }

            h2 {
                font-size: 25px;
                padding-bottom: 12px; /* setingan jarak pading ke bawah */
            }
        </style>
    </head>

    <body id="home">
        <!-- NAVBAR -->
        <div class="navbar">
            <!-- Logo -->
            <a href="#" class="logo"><img src="./assets/logo.png" alt="MamaCare+ Logo">MamaCare+</a>

            <!-- Menu Items -->
            <div class="menu">
                <a href="#"><img src="./assets/img_navbar/icon_home.png" alt="Home"> HOME</a>
                <a href="#Tentang"><img src="./assets/img_navbar/icon_tentang.png" alt="Fitur"> TENTANG</a>
                <a href="#artikel"><img src="./assets/img_navbar/icon_artikel.png" alt="Artikel"> ARTIKEL</a>
                <a href="#FAQ"><img src="./assets/img_navbar/icon_bantuan.png" alt="Bantuan"> FAQ</a>
                <a href="#footer"><img src="./assets/img_navbar/icon_footer.png" alt="Footer"> FOOTER</a>
                <a class="btn-get-started" href="{{ route('login') }}">DAFTAR</a>

            </div>
        </div>

        <!-- REKLAME -->
        <section class="reklame" >
            <div class="reklame-content"></div>
        </section>

        <!-- ISI -->
        <section class="about" id="Tentang">
            <div class="separator"></div>
            <!-- Fitur-fitur -->
            <h2>About MamaCare+</h2>
            <p>
                Aplikasi MamaCare+ adalah solusi digital yang dirancang untuk membantu ibu hamil dan orang tua dalam menjaga kesehatan ibu dan anak secara optimal. Aplikasi ini berfokus pada penyediaan layanan kesehatan berbasis website yang memungkinkan penggunanya untuk memantau perkembangan kesehatan selama kehamilan, mendapatkan informasi nutrisi yang tepat, dan menerima pengingat otomatis untuk kontrol kesehatan serta imunisasi.
            </p>
        </section>

        <!-- Artikel -->
        <!-- Artikel Section -->
        <section class="artikel" id="artikel"><br>
            <h2>Artikel Seputar Ibu dan Anak</h2><br>
            <div class="artikel-container">
                <!-- Set Artikel Pertama -->
                <div class="artikel-slide active-slide">
                    <div class="position1">
                        <div class="artikel-item">
                            <img src="./assets/img_artikel/artikel1.png" alt="Artikel 1">
                            <div class="overlay">
                                <p>KUNCI UNTUK KEHAMILAN YANG SEHAT</p>
                                <div class="green-overlay">
                                    <a href="#" class="btn-article">Selengkapnya →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="position2">
                        <div class="artikel-item">
                            <img src="./assets/img_artikel/artikel2.png" alt="Artikel 2">
                            <div class="overlay">
                                <p>MENGATASI KONTRAKSI DI AKHIR KEHAMILAN</p>
                                <div class="green-overlay">
                                    <a href="#" class="btn-article">Selengkapnya →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="position3">
                        <div class="artikel-item">
                            <img src="./assets/img_artikel/artikel3.png" alt="Artikel 3">
                            <div class="overlay">
                                <p>MEMBANGUN KEBIASAAN MAKAN SEHAT PADA ANAK SEJAK DINI</p>
                                <div class="green-overlay">
                                    <a href="#" class="btn-article">Selengkapnya →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Set Artikel Kedua -->
                <div class="artikel-slide">
                <div class="position1">
                        <div class="artikel-item">
                            <img src="./assets/img_artikel/Artikel4.png" alt="Artikel 1">
                            <div class="overlay">
                                <p>KUNCI UNTUK KEHAMILAN YANG SEHAT</p>
                                <div class="green-overlay">
                                    <a href="#" class="btn-article">Selengkapnya →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="position2">
                        <div class="artikel-item">
                            <img src="./assets/img_artikel/Artikel5.png" alt="Artikel 2">
                            <div class="overlay">
                                <p>MENGATASI KONTRAKSI DI AKHIR KEHAMILAN</p>
                                <div class="green-overlay">
                                    <a href="#" class="btn-article">Selengkapnya →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="position3">
                        <div class="artikel-item">
                            <img src="./assets/img_artikel/Artikel6.png" alt="Artikel 3">
                            <div class="overlay">
                                <p>MEMBANGUN KEBIASAAN MAKAN SEHAT PADA ANAK SEJAK DINI</p>
                                <div class="green-overlay">
                                    <a href="#" class="btn-article">Selengkapnya →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigasi Titik -->
            <div class="dot-navigation">
                <span class="dot active-dot" onclick="showSlide(0)"></span>
                <span class="dot" onclick="showSlide(1)"></span>
            </div>

            <!-- button selengkapnya -->
            <button class="btn-selengkapnya">
                <img src="./assets/img_artikel/tombol_selengkapnya.png" alt="Selengkapnya">
            </button>
        </section>

        <!-- FAQ -->
        <section class="faq" id="FAQ">
            <h2>FAQ</h2>
            <div class="faq-container">
                <div class="faq-item">
                    <button class="faq-question">
                        Siapa yang dapat menggunakan aplikasi MamaCare+?
                        <span class="faq-icon">
                            <img src="./assets/drop down.png">
                        </span>
                    </button>
                    <div class="faq-answer">
                        <p>
                            Aplikasi ini dirancang untuk ibu hamil dan orang tua yang ingin memantau kesehatan kehamilan dan anak secara optimal.
                        </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        Bagaimana cara menggunakan aplikasi MamaCare+?
                        <span class="faq-icon">
                            <img src="./assets/drop down.png">
                        </span>
                    </button>
                    <div class="faq-answer">
                    <p>
                        Kamu dapat mengunduh aplikasi dari website kami dan mengikuti panduan yang ada di dalam aplikasi untuk memulai.
                    </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        Apakah saya akan mendapatkan pengingat untuk jadwal kontrol kehamilan dan imunisasi anak saya?
                        <span class="faq-icon">
                            <img src="./assets/drop down.png">
                        </span>
                    </button>
                    <div class="faq-answer">
                        <p>
                            Ya, MamaCare+ memberikan pengingat otomatis untuk jadwal kontrol kehamilan, imunisasi, dan pemeriksaan anak.
                        </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        Apakah informasi kesehatan saya aman di MamaCare+?
                        <span class="faq-icon">
                            <img src="./assets/drop down.png">
                        </span>
                    </button>
                    <div class="faq-answer">
                        <p>
                            Informasi kesehatan Anda dijaga dengan ketat menggunakan enkripsi standar industri sehingga tetap aman dan privasi Anda terjamin.
                        </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        Bagaimana cara menghubungi tim dukungan jika saya mengalami masalah dengan aplikasi?
                        <span class="faq-icon">
                            <img src="./assets/drop down.png">
                        </span>
                    </button>
                    <div class="faq-answer">
                        <p>
                            Anda dapat menghubungi tim dukungan kami melalui email atau media sosial yang tertera di bagian bawah website.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="footer" id="footer">
            <div class="footer-container">
                <div class="footer-links">
                    <h3>Tentang kami</h3>
                    <a href="#">About Developers</a>
                    <a href="#">Privacy Policy</a>
                </div>
            </div>
            <div class="footer-social">
                <a href="https://www.instagram.com" target="_blank">
                    <img src="./assets/img_footer/icon_ig.png" alt="Instagram" class="social-icon">
                    @mamacareplus
                </a>
                <a href="mailto:mamacareplus@gmail.com" target="_blank">
                    <img src="./assets/img_footer/icon_mail.png" alt="Email" class="social-icon">
                    mamacareplus@gmail.com
                </a>
            </div>
        </footer>
        
        <script src="script.js"></script>
    </body>
</html>