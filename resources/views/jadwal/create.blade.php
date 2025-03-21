<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Data Jadwal</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white text-center">
                            <h5 class="mb-0">Tambah Data Jadwal</h5>
                        </div>
                        <div class="card-body">
                            <!-- Menampilkan pesan error jika ada -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <h6 class="alert-heading">Kesalahan:</h6>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Form Tambah Data -->
                            <form action="{{ route('jadwal.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                        <input type="text" id="nama" name="nama" class="form-control"value="{{ Auth::user()->name }}" placeholder="Masukkan Nama" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-house-fill"></i></span>
                                        <input type="text" id="alamat" name="alamat" class="form-control"value="{{ Auth::user()->alamat }}" placeholder="Masukkan Alamat" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="waktu" class="form-label">Waktu</label>
                                        <input type="time" id="waktu" name="waktu" class="form-control" value="{{ old('waktu') }}" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Lokasi</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                                        <input type="text" id="lokasi" name="lokasi" class="form-control" value="{{ old('lokasi') }}" placeholder="Masukkan Lokasi" required>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="text" id="status" name="status" class="form-control" value="Menunggu" readonly>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                                    <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
