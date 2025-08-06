<html>
<head>
	<title>Data Index</title>
</head>
<body>
	<h1>Data Operator</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Operator ID</th>
                <th>Jabatan</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ambilData as $ambil)
                <tr>
                    <td>{{ $ambil['id'] }}</td>
                    <td>{{ $ambil['nama'] }}</td>
                    <td>{{ $ambil['operator_id'] }}</td>
                    <td>{{ $ambil['jabatan'] }}</td>
                    <td>{{ $ambil['created_at'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>