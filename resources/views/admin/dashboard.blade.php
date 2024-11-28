@extends('template.adminSidebar')

@section('content')
<div class="col-12 col-lg-9">
    <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-3">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon purple mb-2">
                                <i class="iconly-boldShow"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">
                                Jadwal
                            </h6>
                            <h6 class="font-extrabold mb-0">
                                {{ $jadwal }}
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-3">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon blue mb-2">
                                <i class="iconly-boldProfile"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">
                                Atlet
                            </h6>
                            <h6 class="font-extrabold mb-0">
                                {{ $totalAtlet }}
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-3">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon green mb-2">
                                <i class="iconly-boldAdd-User"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">
                                Pelatih
                            </h6>
                            <h6 class="font-extrabold mb-0">
                                {{ $totalPelatih }}
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-3">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon red mb-2">
                                <i class="iconly-boldBookmark"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">
                                Prestasi
                            </h6>
                            <h6 class="font-extrabold mb-0">
                                {{ $prestasi }}
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Atlet hadir</h4>
                </div>
                <div class="card-body">
                    <div id="chart-produk-masuk"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Atlet tidak hadir</h4>
                </div>
                <div class="card-body">
                    <div id="chart-produk-keluar"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12 col-lg-3">
    <div class="card">
        <div class="card-body py-3 px-4">
            <div class="d-flex align-items-center">
                <div class="avatar avatar-xl">
                    <img src="{{ auth()->user()->image_url }}" alt="Face 1" />
                </div>
                <div class="ms-3 name">
                    <h5 class="font-bold">{{ auth()->user()->name }}</h5>
                    <h6 class="text-muted mb-0">
                        Pelatih
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Peran Pengguna</h4>
        </div>
        <div class="card-body">
            <div id="chart-visitors-profile"></div>
        </div>
    </div>
</div>


<script src="{{ url('/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script type="text/javascript">
    

let optionProdukMasuk = {
    annotations: {
        position: "back",
    },
    dataLabels: {
        enabled: false,
    },
    chart: {
        type: "bar",
        height: 300,
    },
    fill: {
        opacity: 1,
    },
    plotOptions: {},
    series: [
        {
            name: "Transaksi",
            data: [12, 23, 34, 45, 21, 23, 12, 45, 5]
        }
    ],
    colors: "#435ebe",
    xaxis: {
        categories: [
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ],
    },
};

let optionProdukKeluar = {
    annotations: {
        position: "back",
    },
    dataLabels: {
        enabled: false,
    },
    chart: {
        type: "bar",
        height: 300,
    },
    fill: {
        opacity: 1,
    },
    plotOptions: {},
    series: [
        {
            name: "Transaksi",
            data: [12, 23, 34, 45, 21, 23, 12, 45, 5]
        }
    ],
    colors: "#F4BB1B",
    xaxis: {
        categories: [
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ],
    },
};


let optionsVisitorsProfile = {
    series: [40, 10],
    labels: ["Atlet", "Pelatih"],
    colors: ["#435ebe", "#55c6e8"],
    chart: {
        type: "donut",
        width: "100%",
        height: "350px",
    },
    legend: {
        position: "bottom",
    },
    plotOptions: {
        pie: {
            donut: {
                size: "30%",
            },
        },
    },
};

let optionsEurope = {
    series: [
        {
            name: "series1",
            data: [310, 800, 600, 430, 540, 340, 605, 805, 430, 540, 340, 605],
        },
    ],
    chart: {
        height: 80,
        type: "area",
        toolbar: {
            show: false,
        },
    },
    colors: ["#5350e9"],
    stroke: {
        width: 2,
    },
    grid: {
        show: false,
    },
    dataLabels: {
        enabled: false,
    },
    xaxis: {
        type: "datetime",
        categories: [
            "2018-09-19T00:00:00.000Z",
            "2018-09-19T01:30:00.000Z",
            "2018-09-19T02:30:00.000Z",
            "2018-09-19T03:30:00.000Z",
            "2018-09-19T04:30:00.000Z",
            "2018-09-19T05:30:00.000Z",
            "2018-09-19T06:30:00.000Z",
            "2018-09-19T07:30:00.000Z",
            "2018-09-19T08:30:00.000Z",
            "2018-09-19T09:30:00.000Z",
            "2018-09-19T10:30:00.000Z",
            "2018-09-19T11:30:00.000Z",
        ],
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false,
        },
        labels: {
            show: false,
        },
    },
    show: false,
    yaxis: {
        labels: {
            show: false,
        },
    },
    tooltip: {
        x: {
            format: "dd/MM/yy HH:mm",
        },
    },
};


let chartProdukMasuk = new ApexCharts(
    document.querySelector("#chart-produk-masuk"),
    optionProdukMasuk
);
let chartProdukKeluar = new ApexCharts(
    document.querySelector("#chart-produk-keluar"),
    optionProdukKeluar
);

let chartVisitorsProfile = new ApexCharts(
    document.getElementById("chart-visitors-profile"),
    optionsVisitorsProfile
);

chartProdukMasuk.render();
chartProdukKeluar.render();
chartVisitorsProfile.render();

</script>

@endsection