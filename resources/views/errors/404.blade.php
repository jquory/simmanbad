@include('template.header')


<div id="error">
    <div class="error-page container">
        <div class="col-md-8 col-12 offset-md-2">
            <div class="text-center">
                <img
                    class="img-error"
                    src="{{ url('/images/samples/error-404.svg') }}"
                    alt="Not Found"
                />
                <h1 class="error-title">TIDAK DITEMUKAN</h1>
                <p class="fs-5 text-gray-600">
                    Halaman yang anda cari tidak ditemukan.
                </p>
                <a
                    href="{{ url()->previous() }}"
                    class="btn btn-lg btn-outline-primary mt-3"
                    >Kembali</a
                >
            </div>
        </div>
    </div>
</div>


@include('template.footer')
