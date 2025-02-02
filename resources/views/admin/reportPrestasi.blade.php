<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Prestasi</title>
    <link href="{{ url('/images/logo_header.png') }}" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <h5 class="text-center">Laporan Prestasi</h5>
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th>No.</th>
                <th>Nama Prestasi</th>
                <th>Peraih</th>
                <th>Tingkat</th>
                <th>Tahun</th>
                <th>Pemberi Prestasi</th>
                <th>Sertifikat</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @forelse ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->tingkat }}</td>
                <td>{{ $item->tahun }}</td>
                <td>{{ $item->pemberi }}</td>
                <td class="w-25">
                    <img class="w-25 m-auto" src="{{ 'https://simmanbad.com/' . $item->sertifikat }}" alt="">
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center">Data Tidak Ada</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>