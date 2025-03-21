<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jadwal Check-Up</title>
        <link rel="icon" href="{{ asset('assets/logo.png') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('style/jadwal_cu.css') }}">
    </head>
    <body>
        <div class="container">
            <!-- Sidebar -->
            <div class="sidebar">
                <div class="logo">
                    <img src="{{ asset('assets/logo2.png') }}" alt="MamaCare+ Logo">
                </div>
                <div class="menu">
                    <h4>Tanggal Pembuatan:</h4>
                    @forelse($dates as $date)
                        <div class="menu-item {{ request('date') == $date->created_date ? 'active' : '' }}">
                            <a href="{{ route('jadwal.index', ['date' => $date->created_date]) }}">
                                {{ \Carbon\Carbon::parse($date->created_date)->format('d F Y') }}
                            </a>
                        </div>
                    @empty
                        <p>Belum ada data.</p>
                    @endforelse

                    <!-- Tombol Tambah Data -->
                    <button class="add-button" onclick="window.location.href='{{ route('jadwal.create') }}'">
                        Tambah Data
                    </button>
                </div>
            </div>

            <!-- Main Content -->
            <div class="content">
                <h2 class="section-title">Jadwal Check-Up</h2>
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jadwalCheckup as $jadwal)
                            <tr>
                                <td>{{ $jadwal->tanggal }}</td>
                                <td>{{ $jadwal->waktu }}</td>
                                <td>{{ $jadwal->lokasi }}</td>
                                <td class="status {{ $jadwal->status == 'terkonfirmasi' ? 'confirmed' : ($jadwal->status == 'selesai' ? 'completed' : 'pending') }}">
                                    @if ($jadwal->status == 'terkonfirmasi')
                                        Terkonfirmasi
                                    @elseif ($jadwal->status == 'selesai')
                                        Selesai
                                    @else
                                        Menunggu
                                    @endif
                                </td>
                                <td>
                                    <!-- Form untuk hapus -->
                                    <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada jadwal check-up.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Tombol Kembali -->
                <div class="section">
                    <button type="button" class="back-button" onclick="window.location.href='{{ url('/home') }}'">Kembali</button>
                </div>
            </div>
        </div>
    </body>
</html>
