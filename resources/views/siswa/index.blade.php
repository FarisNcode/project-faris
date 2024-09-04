<!DOCTYPE html>
<html>

<head>
    <title>Data Siswa</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 20px;
        }

        h1 {
            color: #444;
        }

        /* Form Styles */
        form input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        form button {
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        form button:hover {
            background-color: #218838;
        }

        /* Button Styles */
        button {
            padding: 8px 12px;
            margin-right: 5px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        button:hover {
            background-color: #0069d9;
        }

        button.ubah {
            background-color: #ffc107;
            color: white;
        }

        button.ubah:hover {
            background-color: #e0a800;
        }

        button.hapus {
            background-color: red;
            color: white;
        }

        button.hapus:hover {
            background-color: darkred;
        }


        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #555;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            form input[type="text"] {
                width: 100%;
                margin-bottom: 10px;
            }

            table,
            th,
            td {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <h1>Data Siswa</h1>
    <form action="/aplikasisekolah/search" method="GET" style="margin-bottom: 20px;">
        <input type="text" name="query" placeholder="Cari siswa..." class="form-control"
            style="width: 300px; display: inline-block;">
        <button type="submit" class="btn">Cari</button>
    </form>
    <a href="{{ url('/siswa/tambah') }}"><button>Tambah Data</button></a>
    <a href="{{ url('/aplikasisekolah/search') }}"><button>Refresh</button></a>

    <br><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Info</th>
        </tr>
        @if ($data_siswa->isEmpty())
            <tr>
                <td colspan="6" style="text-align: center;">Data Tidak ada</td>
            </tr>
        @else
            @foreach ($data_siswa as $siswa)
                <tr>
                    <td>{{ $siswa->id }}</td>
                    <td>{{ $siswa->name }}</td>
                    <td>{{ $siswa->email }}</td>
                    <td>{{ $siswa->address }}</td>
                    <td>{{ $siswa->birth_date }}</td>
                    <td>
                        <a href="{{ url('/siswa/detail', $siswa->id) }}"><button>Detail</button></a>
                        <a href="{{ url('/siswa/ubah', $siswa->id) }}"><button class="ubah">Ubah</button></a>
                        <form action="{{ url('/siswa/hapus', $siswa->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="hapus"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
</body>

</html>