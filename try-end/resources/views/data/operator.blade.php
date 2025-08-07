<html>
<head>
    <title>Data Index</title>
    <style>
        .scrollable-table {
            max-height: 250px;     /* tinggi maksimal, bisa disesuaikan */
            overflow-y: auto;      /* scroll vertikal */
            overflow-x: auto;      /* scroll horizontal jika dibutuhkan */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            white-space: nowrap;   /* agar isi tidak turun ke bawah */
        }
    </style>
</head>
<body>
    <h1>Data Operator</h1>
    
    <div class="scrollable-table">

            {{-- Flash message --}}
                @if (session('success'))
                    <div class="alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert-error">{{ session('error') }}</div>
                @endif

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Alat</th>
                    <th>Lokasi</th>
                    <th>Aktivitas</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Status</th>
                    <th>Tanggal Input</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ambilDataAktivitas as $ambilAktivitas)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ambilAktivitas['nama_alat'] }}</td>
                        <td>{{ $ambilAktivitas['lokasi'] }}</td>
                        <td>{{ $ambilAktivitas['aktivitas'] }}</td>
                        <td>{{ $ambilAktivitas['jam_mulai'] }}</td>
                        <td>{{ $ambilAktivitas['jam_selesai'] }}</td>
                        <td>{{ $ambilAktivitas['status'] }}</td>
                        <td>{{ $ambilAktivitas['created_at'] }}</td>
                        <td class="actions">
                        {{-- Tombol Edit --}}
                        {{-- <a href="{{ route('data.edit', $ambilAktivitas['id']) }}">Edit</a> --}}

                        {{-- Tombol Hapus --}}
                        <form action="{{ route('operators.hapus', $ambilAktivitas['id']) }}" method="POST" 
                        onsubmit="return confirm('Yakin ingin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
