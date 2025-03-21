<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="../assets/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../style/regist.css">
    <style>
        /* Tambahan untuk multi-step */
        .step {
            display: none;
        }
        .step.active {
            display: block;
        }
    </style>
</head>
<body>
    <div class="top-image">
        <img src="../assets/img_form/decoration1.png" alt="Top Decoration">
    </div>

    <div class="center-box">
        <div class="logo"></div>

        <div class="menu">
            <a href="{{route('login')}}" class="login-btn">Login</a>
            <a href="#" class="register-btn active">Register</a>
        </div>

        <!-- Multi-step form -->
        <div id="multi-step-form">
            <!-- Step 1 -->
            <div class="step active" id="step-1">
                <h1 class="register-heading">Enter Your Personal Data!</h1>
                <p class="register-subheading">Please type your personal data here!</p>
                <form method="POST" action="{{ route('register') }}">
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                    @csrf
                    <label for="nama" class="form-label">Nama Lengkap<span class="required">*</span></label>
                    <input type="text" id="nama" name="name" placeholder="Enter Your Full Name" class="form-input" required>

                    <label for="nik" class="form-label">NIK<span class="required">*</span></label>
                    <input type="text" id="nik" name="nik" placeholder="Enter NIK" class="form-input" required>

                    <label for="ttl" class="form-label">TTL<span class="required">*</span></label>
                    <input type="date" id="ttl" name="ttl" class="form-input" required>

                    <label for="gol_darah" class="form-label">Gol. Darah<span class="required">*</span></label>
<div class="select-container">
    <select id="gol_darah" name="gol_darah" class="form-input" required>
        <option value="" disabled selected>Pilih Golongan Darah</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="AB">AB</option>
        <option value="O">O</option>
    </select>
    <span class="dropdown-icon">▼</span>
</div>

                    

                    <label for="alamat" class="form-label">Alamat<span class="required">*</span></label>
                    <input type="text" id="alamat" name="alamat" placeholder="Address" class="form-input" required>

                    <div class="button-section">
                        <button type="button" class="cancel-button" onclick="prevStep()">Cancel</button>
                        <button type="button" class="next-button" onclick="nextStep()">Next</button>
                    </div>
                <p class="page-indicator">1/2</p>
            </div>

            <!-- Step 2 -->
            <div class="step" id="step-2">
                <h1 class="register-heading">Regist Your Account Now</h1>
                <p class="register-subheading">Please type your account info, to create an account!</p>
                    <label for="email" class="form-label">Email<span class="required">*</span></label>
                    <input type="email" id="email" name="email" placeholder="Enter Your Email" class="form-input" required>

                    <label for="username" class="form-label">Username<span class="required">*</span></label>
                    <input type="text" id="username" name="username" placeholder="Enter Username" class="form-input" required>

                    <label for="password" class="form-label">Password<span class="required">*</span></label>
                    <input type="password" id="password" name="password" placeholder="Enter Password" class="form-input" required>

                    <label for="confirm-password" class="form-label">Confirm Password<span class="required">*</span></label>
                    <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm Password" class="form-input" required>

                    <label for="no_telp" class="form-label">No.Telp<span class="required">*</span></label>
                    <input type="text" id="no_telp" name="no_telp" placeholder="Enter Your Phone Number" class="form-input" required>

                    <div class="button-section">
                        <button type="button" class="cancel-button" onclick="prevStep()">Previous</button>
                        <button type="submit" class="next-button">{{ __('Register') }}</button>
                    </div>
                </form>
                <p class="page-indicator">2/2</p>
            </div>
        </div>
    </div>

    <div class="bottom-image">
        <img src="../assets/img_form/decoration2.png" alt="Bottom Decoration">
    </div>

    <script>
        let currentStep = 1;

        function showStep(step) {
            document.querySelectorAll('.step').forEach((element, index) => {
                element.classList.remove('active');
                if (index + 1 === step) {
                    element.classList.add('active');
                }
            });
        }

        function nextStep() {
            if (currentStep < 2) {
                currentStep++;
                showStep(currentStep);
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        }
    </script>
</body>
</html>
