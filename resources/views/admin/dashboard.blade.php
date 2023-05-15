@extends('template.adminSidebar')
{{-- @section('title')
<h1>Halo {{ Auth::user()->name }}</h1>    
@endsection --}}

@section('content')
<div class="col-12 col-lg-9">
    <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div
                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                        >
                            <div
                                class="stats-icon purple mb-2"
                            >
                                <i
                                    class="iconly-boldShow"
                                ></i>
                            </div>
                        </div>
                        <div
                            class="col-md-8 col-lg-12 col-xl-12 col-xxl-7"
                        >
                            <h6
                                class="text-muted font-semibold"
                            >
                                Profile Views
                            </h6>
                            <h6
                                class="font-extrabold mb-0"
                            >
                                112.000
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div
                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                        >
                            <div
                                class="stats-icon blue mb-2"
                            >
                                <i
                                    class="iconly-boldProfile"
                                ></i>
                            </div>
                        </div>
                        <div
                            class="col-md-8 col-lg-12 col-xl-12 col-xxl-7"
                        >
                            <h6
                                class="text-muted font-semibold"
                            >
                                Followers
                            </h6>
                            <h6
                                class="font-extrabold mb-0"
                            >
                                183.000
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div
                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                        >
                            <div
                                class="stats-icon green mb-2"
                            >
                                <i
                                    class="iconly-boldAdd-User"
                                ></i>
                            </div>
                        </div>
                        <div
                            class="col-md-8 col-lg-12 col-xl-12 col-xxl-7"
                        >
                            <h6
                                class="text-muted font-semibold"
                            >
                                Following
                            </h6>
                            <h6
                                class="font-extrabold mb-0"
                            >
                                80.000
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div
                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                        >
                            <div
                                class="stats-icon red mb-2"
                            >
                                <i
                                    class="iconly-boldBookmark"
                                ></i>
                            </div>
                        </div>
                        <div
                            class="col-md-8 col-lg-12 col-xl-12 col-xxl-7"
                        >
                            <h6
                                class="text-muted font-semibold"
                            >
                                Saved Post
                            </h6>
                            <h6
                                class="font-extrabold mb-0"
                            >
                                112
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
                    <h4>Profile Visit</h4>
                </div>
                <div class="card-body">
                    <div id="chart-profile-visit"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Log Aktivitas</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            class="table table-hover table-lg"
                        >
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Aktivitas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-3">
                                        <div
                                            class="d-flex align-items-center"
                                        >
                                            <div
                                                class="avatar avatar-md"
                                            >
                                                <img
                                                    src="{{ url('/images/faces/5.jpg') }}"
                                                />
                                            </div>
                                            <p
                                                class="font-bold ms-3 mb-0"
                                            >
                                                Si
                                                Cantik
                                            </p>
                                        </div>
                                    </td>
                                    <td
                                        class="col-auto"
                                    >
                                        <p class="mb-0">
                                            Congratulations
                                            on your
                                            graduation!
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-3">
                                        <div
                                            class="d-flex align-items-center"
                                        >
                                            <div
                                                class="avatar avatar-md"
                                            >
                                                <img
                                                    src="{{ url('/images/faces/2.jpg') }}"
                                                />
                                            </div>
                                            <p
                                                class="font-bold ms-3 mb-0"
                                            >
                                                Si
                                                Ganteng
                                            </p>
                                        </div>
                                    </td>
                                    <td
                                        class="col-auto"
                                    >
                                        <p class="mb-0">
                                            Wow amazing
                                            design! Can
                                            you make
                                            another
                                            tutorial for
                                            this design?
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12 col-lg-3">
    <div class="card">
        <div class="card-body py-4 px-4">
            <div class="d-flex align-items-center">
                <div class="avatar avatar-xl">
                    <img
                        src="{{ url('/images/faces/1.jpg') }}"
                        alt="Face 1"
                    />
                </div>
                <div class="ms-3 name">
                    <h5 class="font-bold">{{ auth()->user()->name }}</h5>
                    <h6 class="text-muted mb-0">
                        Administrator
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Recent Messages</h4>
        </div>
        <div class="card-content pb-4">
            <div
                class="recent-message d-flex px-4 py-3"
            >
                <div class="avatar avatar-lg">
                    <img
                        src="{{ url('/images/faces/4.jpg') }}"
                    />
                </div>
                <div class="name ms-4">
                    <h5 class="mb-1">Hank Schrader</h5>
                    <h6 class="text-muted mb-0">
                        @johnducky
                    </h6>
                </div>
            </div>
            <div
                class="recent-message d-flex px-4 py-3"
            >
                <div class="avatar avatar-lg">
                    <img
                        src="{{ url('/images/faces/5.jpg') }}"
                    />
                </div>
                <div class="name ms-4">
                    <h5 class="mb-1">
                        Dean Winchester
                    </h5>
                    <h6 class="text-muted mb-0">
                        @imdean
                    </h6>
                </div>
            </div>
            <div class="recent-message d-flex px-4 py-3">
                <div class="avatar avatar-lg">
                    <img
                        src="{{ url('/images/faces/1.jpg') }}"
                    />
                </div>
                <div class="name ms-4">
                    <h5 class="mb-1">John Dodol</h5>
                    <h6 class="text-muted mb-0">
                        @dodoljohn
                    </h6>
                </div>
            </div>
            
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Visitors Profile</h4>
        </div>
        <div class="card-body">
            <div id="chart-visitors-profile"></div>
        </div>
    </div>
</div>

<script src="{{ url('/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script type="text/javascript">
var jsonData = JSON.parse('{!! $jsonData !!}');
let optionsProfileVisit = {
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
            name: "Akun",
            data: [jsonData[0].count],
        },
    ],
    colors: "#435ebe",
    xaxis: {
        categories: [
            jsonData[0].month_name
        ],
    },
};
let optionsVisitorsProfile = {
    series: [70, 30],
    labels: ["Male", "Female"],
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


let chartProfileVisit = new ApexCharts(
    document.querySelector("#chart-profile-visit"),
    optionsProfileVisit
);
let chartVisitorsProfile = new ApexCharts(
    document.getElementById("chart-visitors-profile"),
    optionsVisitorsProfile
);

chartProfileVisit.render();
chartVisitorsProfile.render();

</script>

@endsection

