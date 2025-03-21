

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="../assets/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/login.css">
</head>
<body>
    <div class="top-image">
        <img src="../assets/img_form/decoration1.png" alt="Top Decoration">
    </div>

    <!-- Kotak di tengah dengan gambar di dalamnya -->
    <div class="center-box">
        <div class="logo"></div>

        <!-- Menu Login dan Register di dalam kotak -->
        <div class="menu">
            <a href="#" class="login-btn">Login</a>
            <a href="{{route('register')}}" class="register-btn">Register</a>
        </div>

        <!-- Teks Welcome di dalam kotak, di bawah menu -->
        <h1 class="welcome-text">Welcome</h1>
        <p class="account-info-text">Please type your account info!</p>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <!-- Form untuk input -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Label dan Input untuk Username -->
            <label for="username" class="username-label">Email</label>
            <input type="text" id="username" name="email" placeholder="Enter Username" class="username-input">

            <!-- Label dan Input untuk Password -->
            <label for="password" class="password-label">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" class="password-input">

            <!-- Link Forgot -->
            <div class="forgot-section">
                <a href="#" class="forgot-link">Forgot?</a>
            </div>

            <!-- Tombol Batal dan Login -->
            <div class="button-section">
                <button type="button" class="cancel-button" >Batal</button>
                <button type="submit" class="submit-button">Login</button>
            </div>            

            <!-- Garis horizontal dengan tulisan OR -->
            <div class="divider">
                <span>OR</span>
            </div>
        </form>
    </div>

    <div class="bottom-image">
        <img src="../assets/img_form/decoration2.png" alt="Bottom Decoration">
    </div>
</body>
</html>