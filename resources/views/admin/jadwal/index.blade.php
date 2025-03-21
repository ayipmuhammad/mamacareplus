@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Kelola Jadwal Check-Up</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol Tambah Data -->
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Data</button>

    <!-- Tabel Jadwal Check-Up -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwalCheckup as $jadwal)
                <tr>
                    <td>{{ $jadwal->user->name ?? 'Tidak Diketahui' }}</td>
                    <td>{{ $jadwal->tanggal }}</td>
                    <td>{{ $jadwal->waktu }}</td>
                    <td>{{ $jadwal->lokasi }}</td>
                    <td>
                        @if ($jadwal->status == 'menunggu')
                            Menunggu
                        @elseif ($jadwal->status == 'terkonfirmasi')
                            Terkonfirmasi
                        @elseif ($jadwal->status == 'selesai')
                            Selesai
                        @endif
                    </td>
                    <td>
                        <!-- Aksi -->
                        <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                <option value="menunggu" {{ $jadwal->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="terkonfirmasi" {{ $jadwal->status == 'terkonfirmasi' ? 'selected' : '' }}>Terkonfirmasi</option>
                                <option value="selesai" {{ $jadwal->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </form>
                        <form action="{{ route('admin.jadwal.destroy', $jadwal->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Data Jadwal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.jadwal.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="user_id" class="form-label">Pilih User</label>
                            <select name="user_id" id="user_id" class="form-select" required onchange="updateAlamat()">
                                <option value="" selected disabled>Pilih User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" data-alamat="{{ $user->alamat }}">{{ $user->name }} ({{ $user->email }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="waktu" class="form-label">Waktu</label>
                            <input type="time" name="waktu" id="waktu" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Masukkan lokasi" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="menunggu">Menunggu</option>
                                <option value="terkonfirmasi">Terkonfirmasi</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateAlamat() {
        const userDropdown = document.getElementById('user_id');
        const selectedOption = userDropdown.options[userDropdown.selectedIndex];
        const alamat = selectedOption.getAttribute('data-alamat');
        document.getElementById('alamat').value = alamat || '';
    }
</script>
@endsection

