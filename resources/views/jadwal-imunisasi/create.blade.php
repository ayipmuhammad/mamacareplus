<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Jadwal Imunisasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-success shadow-sm">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ route('home') }}">Sistem Imunisasi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('jadwal-imunisasi.index') }}">Jadwal Imunisasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Container Form -->
    <div class="container mt-4">
        <h1 class="text-center text-success mb-4">Buat Jadwal Imunisasi</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <!-- Form Input Jadwal Imunisasi -->
                <form action="{{ route('jadwal-imunisasi.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_anak" class="form-label">Nama Anak</label>
                        <input type="text" id="nama_anak" name="nama_anak" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="usia" class="form-label">Usia (bulan)</label>
                        <input type="number" id="usia" name="usia" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" id="lokasi" name="lokasi" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_imunisasi" class="form-label">Jenis Imunisasi</label>
                        <input type="text" id="jenis_imunisasi" name="jenis_imunisasi" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan (Opsional)</label>
                        <textarea id="catatan" name="catatan" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Simpan Jadwal</button>
                </form>
            </div>
        </div>

        <!-- Tombol Kembali ke Daftar Jadwal -->
        <div class="text-center mt-3">
            <a href="{{ route('jadwal-imunisasi.index') }}" class="btn btn-secondary">Kembali ke Daftar Jadwal</a>
        </div>
    </div>

    <!-- Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
