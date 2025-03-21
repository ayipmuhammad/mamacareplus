<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Imunisasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-success shadow-sm">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ route('home') }}">MamaCare+</a>
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

    <!-- Main Content -->
    <div class="container mt-5">
        
        <!-- Kembali ke Home Button -->
        <div class="d-flex justify-content-start mb-3">
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">Kembali ke Home</a>
        </div>

        <!-- Title -->
        <h1 class="text-center text-success mb-4">Daftar Jadwal Imunisasi</h1>

        <!-- Create Jadwal Button -->
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('jadwal-imunisasi.create') }}" class="btn btn-success">Buat Jadwal Baru</a>
        </div>

        <!-- Success Alert -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Jadwal Table -->
        @if ($jadwal->isEmpty())
            <div class="alert alert-info">Belum ada jadwal imunisasi.</div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Anak</th>
                            <th>Usia (bulan)</th>
                            <th>Tanggal</th>
                            <th>Lokasi</th>
                            <th>Jenis Imunisasi</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_anak }}</td>
                                <td>{{ $item->usia }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->lokasi }}</td>
                                <td>{{ $item->jenis_imunisasi }}</td>
                                <td>{{ $item->catatan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
