<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Barang Masuk</title>
    <link href="{{ url('/images/logo_header.png') }}" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <h5 class="text-center">Laporan Barang Masuk</h5>
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th>Unit Kerja</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>No. Telepon</th>
            </tr>
        </thead>
        <tbody class="text-center">
            {{-- @forelse ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->nip }}</td>
                <td>{{ $item->gender }}</td>
                <td>{{ $item->position }}</td>
                <td>{{ $item->unit }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone_number }}</td>

            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center">Data Tidak Ada</td>
            </tr>
            @endforelse --}}
        </tbody>
    </table>
</body>

</html>