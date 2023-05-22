@extends('template.adminSidebar')

@section('content')

<div class="row justify-content-center match-height">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('/admin/barang-masuk') }}" class="d-flex gap-2 mb-3">
                    <i class="bi bi-arrow-left-short"></i>Kembali
                </a>
                <h3 class="card-title">Input Barang Masuk</h3>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" method="POST" action="{{ url('/admin/barang-masuk/store') }}">
                        @method('post')
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label>Nama Barang</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <select class="form-select" aria-label="Default select example" onchange="autoFill()" id="selectProduct">
                                                <option selected value="">Pilih Barang</option>
                                                @foreach($barang as $barang)
                                                <option value="{{ $barang->nama_barang }}">{{ $barang->nama_barang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label>Kode Barang</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="kodeBarang" class="form-control" placeholder="Kode Barang"
                                                id="kodeBarang" disabled>
                                            <div class="form-control-icon">
                                                <i class="bi bi-unity"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4 mb-2">
                                    <label>Satuan</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="satuan" class="form-control" placeholder="Satuan" id="satuan" disabled>
                                            <div class="form-control-icon">
                                                <i class="bi bi-box"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Jumlah Masuk</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="number" name="waktu" class="form-control" placeholder="Jumlah Masuk" id="jumlah" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-123"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Waktu Masuk</label>
                                </div>
                                <div class="col-md-8 mb-2">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="date" name="waktu" class="form-control" placeholder="Waktu Masuk" id="waktu" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-layers"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end mt-4">
                                    <button type="submit" id="btnSubmit" class="btn btn-primary me-3 mb-1">Submit</button>
                                    <button type="reset"
                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function autoFill() {
        const productName = document.getElementById('selectProduct').value
        if(productName) {
            const url = '/admin/barang-masuk/getDetail/' + productName
            fetch(url)
            .then(res => res.json())
            .then(data => console.log(data))
        }

    }
</script>

<script src="{{ url('/extensions/toastify-js/src/toastify.js') }}"></script>
<script src="{{ url('/js/pages/toastify.js') }}"></script>

@endsection