@extends('template.adminSidebar')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Data Barang</h4>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Waktu</th>
                        <th>Aktivitas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allRecords as $record)
                    <tr>
                        <td class="col-3">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-md">
                                    <img src="{{ $record->image_url }}" />
                                </div>
                                <p class="font-bold ms-3 mb-0">
                                    {{ $record->name }}
                                </p>
                            </div>
                        </td>
                        <td class="col-3">
                            <p class="waktu-history">
                                {{ \Carbon\Carbon::parse($record->created_at)->isoFormat('dddd, D MMMM Y hh:mm') }}
                            </p>
                        </td>
                        <td class="col-auto">
                            <p class="mb-0">
                                {{ $record->detail_aktivitas }}
                            </p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<script src="{{ url('/extensions/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="{{ url('/js/pages/datatables.js') }}"></script>
@endsection