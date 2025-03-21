<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MamaCare+</title>
        <link rel="icon" href="./assets/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="./style/navbar.css">
        <link rel="stylesheet" href="./style/body.css">
        <link rel="stylesheet" href="./style/artikel.css">
        <link rel="stylesheet" href="./style/footer.css">

        <style>
            /* Reklame */
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

            /* ==================== FITUR ======================== */
            .fitur {
                display: flex;
                justify-content: center; /* penempatan item fitur */
                gap: 50px; /* jarak antar item fitur */
                padding: 10px;
            }
            /* ukuran img fitur */
            .fitur img {
                width: 80px;
                padding-bottom: 10px;
            }
            /* link style */
            .fitur a {
                text-decoration: none;
                color: #000000;
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
            <a href="#"><img src="./assets/img_navbar/icon_home.png" alt="Home"> HOME</a>
            <a href="#Fitur-fitur"><img src="./assets/img_navbar/icon_fitur.png" alt="Fitur"> FITUR</a>
            <a href="#artikel-seputar-ibu-anak"><img src="./assets/img_navbar/icon_artikel.png" alt="Artikel"> ARTIKEL</a>
            <a href="#footer"><img src="./assets/img_navbar/icon_footer.png" alt="Footer"> FOOTER</a>
            <a href="#"><img src="./assets/img_navbar/icon_bantuan.png" alt="Bantuan"> BANTUAN</a>
            <a href="#" class="notif">
                <img src="./assets/img_navbar/icon_notif.png" alt="Notifikasi"> NOTIF
                <span class="badge">1</span>
            </a>
            <a href="#" class="profile-link" onclick="toggleDropdown(event)">
                <img src="img/Avatar.png" alt="Foto Profil" class="avatar-icon">
                <span style="text-transform: uppercase;">{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu">
                <form id="logout-form" action="/logout" method="POST" style="margin: 0; padding: 0;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: #FFFFFF; font-size: 14px; cursor: pointer;">
                        Logout
                    </button>
                </form>
            </div>
            
            
            </div>
        </div>

        <!-- REKLAME -->
        <section class="reklame"></section>

        <!-- ISI -->
        <section class="about" id="Fitur-fitur">
            <div class="separator"></div>
            <!-- Fitur-fitur -->
            <h2>MyCarePlus</h2>
            <p>Gunakan menu dibawah ini untuk melihat informasi dan mengelola data kesehatan ibu dan anak.</p> <br>

            <div class="fitur">
                <a href="{{route('profil')}}"><img src="./assets/img_fitur/edit_profil.png" alt="Edit Profil - Fitur">
                    <p>Edit <br> Profil</p>
                </a>
                <a href="{{route('kalender')}}"><img src="./assets/img_fitur/kalender_kehamilan.png" alt="Kalender Kehamilan - Fitur">
                    <p>Kalender <br> Kehamilan</p>
                </a>
                <a href="{{route('jadwal.index')}}"><img src="./assets/img_fitur/jadwal_cu.png" alt="Jadwal Check-Up - Fitur">
                    <p>Jadwal <br> Check-Up</p>
                </a>
                <a href="{{route('jadwal-imunisasi.index')}}"><img src="./assets/img_fitur/jadwal_im.png" alt="Jadwal Imunisasi - Fitur">
                    <p>Jadwal <br> Imunisasi</p>
                </a>
                <a href="{{route('pandnut')}}"><img src="./assets/img_fitur/buku_panduan.png" alt="Panduan Pemenuhan Nutrisi - Fitur">
                <p>Panduan <br> Nutrisi</p>
                </a>
                <a href="./chatpage/index.php"><img src="./assets/img_fitur/chat_admin.png" alt="Chat Admin - Fitur">
                    <p>Chat <br> Admin</p>
                </a>
            </div>
        </section>

        <!-- Artikel -->
        <!-- Artikel Section -->
        <section class="artikel" id="artikel-seputar-ibu-anak"><br>
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
                                    <a href="{{route('artikel1')}}" class="btn-article">Selengkapnya →</a>
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
                                    <a href="{{route('artikel2')}}" class="btn-article">Selengkapnya →</a>
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
                                    <a href="{{route('artikel3')}}" class="btn-article">Selengkapnya →</a>
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
                                    <a href="{{route('artikel4')}}" class="btn-article">Selengkapnya →</a>
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
                                    <a href="{{route('artikel5')}}" class="btn-article">Selengkapnya →</a>
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
                                    <a href="{{route('artikel6')}}" class="btn-article">Selengkapnya →</a>
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

        <!-- FOOTER -->
        <footer class="footer" id="footer">
            <div class="footer-container">
                <div class="footer-links">
                    <h3>Tentang kami</h3>
                    <a href="dev.html">About Developers</a>
                    <a href="privpol.html">Privacy Policy</a>
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