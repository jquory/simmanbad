<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Akhir</title>
    <link href="{{ url('/images/logo_header.png') }}" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <h5 class="text-center">Laporan Akhir</h5>
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th>No.</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Spek/Ukuran</th>
                <th>Satuan</th>
                <th>Stok Awal</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
                <th>Stok Akhir</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody class="text-center">
            {{-- @forelse ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->kode_barang }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->satuan }}</td>
                <td>{{ $item->total_jumlah_keluar }}</td>
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