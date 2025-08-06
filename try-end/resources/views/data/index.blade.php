<html>
<head>
    <title>Data Index</title>
    <style>
        .scrollable-table {
            max-height: 200px;     /* tinggi maksimal, bisa disesuaikan */
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
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Operator ID</th>
                    <th>Jabatan</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ambilData as $ambil)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ambil['nama'] }}</td>
                        <td>{{ $ambil['operator_id'] }}</td>
                        <td>{{ $ambil['jabatan'] }}</td>
                        <td>{{ $ambil['created_at'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
