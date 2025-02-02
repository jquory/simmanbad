@extends('template.adminSidebar')

@section('content')
{{-- <section class="section">
    <div class="row"> --}}
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <div class="avatar avatar-xl">
                            <img src="{{ url($record->image_url) }}" alt="Avatar">
                        </div>

                        <h3 class="mt-3">{{ $record->name }}</h3>
                        <p class="text-small">{{ $record->gender }}</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <h3>Prestasi</h3>
                        <ul>
                            @foreach($prestasi as $p)
                                <li><span class="text-primary">({{ $p->tahun }}) ~ </span>{{ $p->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <h3>Jadwal minggu ini</h3>
                        <ul>
                            @foreach($jadwal as $j)
                                <li>{{ $j->tanggal }} <span class="badge {{ $j->status == 'Hadir' ? 'bg-light-success' : 'bg-danger' }}">{{ $j->status }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('/admin/daftar-atlet/' . $record->uuid) }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" value="{{ $record->name }}">
                        </div>
                        <div class="form-group">
                            <label for="ttl" class="form-label">Tanggal lahir</label>
                            <input type="date" name="ttl" id="ttl" class="form-control" placeholder="Belum diisi" value="{{ $record->ttl }}">
                        </div>
                        <div class="form-group">
                            <label for="gender" class="form-label">Gender</label>
                            <select name="gender" class="form-select"
                                aria-label="Default select example"
                                id="gender">
                                <option selected value="Perempuan">Perempuan</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="unit" class="form-label">Unit</label>
                            <input type="text" name="unit" id="unit" class="form-control" placeholder="Belum diisi" value="{{ $record->unit }}">
                        </div>
                        <div class="form-group">
                            <label for="TMT" class="form-label">TMT</label>
                            <input type="date" name="tmt" id="tmt" class="form-control" placeholder="Belum diisi" value="{{ $record->tmt }}">
                        </div>
                        <div class="form-group">
                            <label for="penempatan" class="form-label">Penempatan</label>
                            <input type="text" name="penempatan" id="penempatan" class="form-control" placeholder="Belum diisi" value="{{ $record->penempatan }}">
                        </div>
                        <div class="form-group">
                            <label for="penempatan" class="form-label">Foto profil</label>
                            <input type="file" name="image" id="image" class="form-control" placeholder="Belum diisi" value="{{ $record->image_url }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    {{-- </div>
</section> --}}
@endsection