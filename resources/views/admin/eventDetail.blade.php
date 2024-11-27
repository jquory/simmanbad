@extends('template.adminSidebar')

@section('content')

<div class="card">
    <img src="{{ url($event->image) }}" alt="">

    <div class="mt-5">
        <h5><span class="text-primary">Judul : </span>{{ $event->name }}</h5>
        <h5><span class="text-primary">Tanggal : </span>{{ $event->tanggal }}</h5>
        <h5><span class="text-primary">Di ikuti oleh : </span>{{ $eventParticipant }} orang</h5>
    </div>

    <div class="mt-3">
        <p>{{ $event->detil }}</p>
    </div>
</div>

@endsection