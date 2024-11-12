<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <style>
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin: 20px 0;
            font-size: 16px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th {
            padding: 15px;
            background-color: #252a48;
            color: white;
            text-align: left;
            font-weight: 600;
            font-size: 15px;
            border:5px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        caption {
            font-size: 18px;
            font-weight: 600;
            padding: 10px 0;
            color: #333;
        }

        tr:last-child td {
            border-bottom: none;
        }
    </style>

    <a href="{{ url('/student/tambah') }}" style="display: inline-block; margin-bottom: 15px; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Tambah Data</a>

    <!-- Tabel Data Mahasiswa -->
    <table>
        <caption>Student Information</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Grade</th>
                <th>Email</th>
                <th>Address</th>
                <th>Department</th> <!-- Kolom Departemen -->
            </tr>
        </thead>
        <tbody>
            @foreach($student as $s)
            <tr>
                <td>{{ $s['id'] }}</td>
                <td>{{ $s['name'] }}</td>
                <td>{{ $s->grade['name'] }}</td>
                <td>{{ $s['email'] }}</td>
                <td>{{ $s['address'] }}</td>
                <td>{{ $s->department['name'] ?? 'No Department' }}</td> <!-- Menampilkan Nama Departemen -->
            </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>
