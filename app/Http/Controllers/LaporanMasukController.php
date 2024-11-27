<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\IndexBarang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LaporanMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        if($request->start_date) {
            $data = BarangMasuk::select('nama_barang', 'kode_barang', 'satuan', DB::raw('SUM(jumlah_masuk) as total_jumlah_masuk'))
            ->groupBy('nama_barang', 'kode_barang', 'satuan')
            ->whereBetween('waktu_masuk', [$startDate, $endDate])
            ->get();
            return view('admin.laporanMasuk', compact('data'));
        } else {
            $data = BarangMasuk::select('nama_barang', 'kode_barang', 'satuan', DB::raw('SUM(jumlah_masuk) as total_jumlah_masuk'))
                ->groupBy('nama_barang', 'kode_barang', 'satuan')
                ->get();
                return view('admin.laporanMasuk', compact('data'));
        }
    }
        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPdfMasuk(Request $request)
    {
        $startDate = $request->input('dari');
        $endDate = $request->input('ke');
        
        $data = BarangMasuk::select('nama_barang', 'kode_barang', 'satuan', 'waktu_masuk', DB::raw('SUM(jumlah_masuk) as total_jumlah_masuk'))
        ->groupBy('nama_barang', 'kode_barang', 'satuan', 'waktu_masuk')
        ->whereBetween('waktu_masuk', [$startDate, $endDate])
        ->get();
        $pdf = Pdf::loadView('admin.reportBarangMasuk', compact('data'))->setPaper('A4', 'landscape');
        return $pdf->stream('Barang Masuk.pdf');
    }


    public function indexKeluar(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        if($request->start_date) {
            $data = BarangKeluar::select('nama_barang', 'kode_barang', 'satuan', DB::raw('SUM(jumlah_keluar) as total_jumlah_keluar'))
            ->groupBy('nama_barang', 'kode_barang', 'satuan')
            ->whereBetween('waktu_keluar', [$startDate, $endDate])
            ->get();
            return view('admin.laporanKeluar', compact('data'));
        } else {
            $data = BarangKeluar::select('nama_barang', 'kode_barang', 'satuan', DB::raw('SUM(jumlah_keluar) as total_jumlah_keluar'))
                ->groupBy('nama_barang', 'kode_barang', 'satuan')
                ->get();
                return view('admin.laporanKeluar', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPdfKeluar()
    {
        $data = BarangKeluar::select('nama_barang', 'kode_barang', 'satuan', DB::raw('SUM(jumlah_keluar) as total_jumlah_keluar'))
        ->groupBy('nama_barang', 'kode_barang', 'satuan')
        ->get();
        $pdf = Pdf::loadView('admin.reportBarangKeluar', compact('data'))->setPaper('A4', 'landscape');
        return $pdf->stream('Barang Keluar.pdf');
    }

    public function laporanAkhir() {
        $semuaData = DB::table('barang')
        ->leftJoin('barang_keluar', 'barang.id', '=', 'barang_keluar.id_barang')
        ->leftJoin('barang_masuk', 'barang.id', '=', 'barang_masuk.id_barang')
        ->leftJoin('stock', 'barang.id', '=', 'stock.id_barang')
        ->select(
            'barang.nama_barang',
            'barang.kode_barang',
            'barang.spek',
            'barang.harga',
            'barang.satuan',
            'barang_keluar.jumlah_keluar',
            'barang_masuk.jumlah_masuk',
            'stock.stok_awal',
            'stock.stok_akhir'
        )->get();
        return view('admin.laporanAkhir', compact('semuaData'));
    }

    public function getPdfAkhir(Request $request)
    {
        // if($request->start_date && $request->end_date) {
        //     $dari = $request->start_date;
        //     $ke = $request->end_date;
        // }
        $pdf = Pdf::loadView('admin.reportAkhir',)->setPaper('A4', 'landscape');
        return $pdf->stream('Laporan Akhir.pdf');
    }
}
