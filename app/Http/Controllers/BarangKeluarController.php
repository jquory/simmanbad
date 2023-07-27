<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\History;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allRecords = DB::table('barang_keluar')
        ->select('id', 'uuid', 'kode_barang', 'nama_barang', 'jumlah_keluar', 'satuan', 'waktu_keluar', 'created_at')
        ->orderBy('created_at', 'desc')
        ->get();

        return view('admin.barangKeluar', compact('allRecords'));
    }

    public function indexUser()
    {
        $allRecords = DB::table('barang_keluar')
        ->select('id', 'uuid', 'kode_barang', 'nama_barang', 'jumlah_keluar', 'satuan', 'waktu_keluar', 'created_at')
        ->orderBy('created_at', 'desc')
        ->get();

        return view('user.barangKeluar', compact('allRecords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = DB::table('barang')
        ->select('id', 'nama_barang', 'created_at')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin.createBarangKeluar', compact('barang'));
    }

    public function userCreate()
    {
        $barang = DB::table('barang')
        ->select('id', 'nama_barang', 'created_at')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('user.createBarangKeluar', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barangKeluar = new BarangKeluar();
        
        $namaBarang = DB::table('barang')->select('nama_barang')->where('id', '=', $request->namaBarang)->first();
        $stok = DB::table('stock')->select('stok_akhir')->where('id_barang', '=', $request->namaBarang)->first();
        $barangKeluar->uuid = Str::uuid();
        $barangKeluar->id_barang = $request->namaBarang;
        $barangKeluar->nama_barang = $namaBarang->nama_barang;
        $barangKeluar->kode_barang = $request->kodeBarang;
        $barangKeluar->satuan = $request->satuan;
        $barangKeluar->waktu_keluar = $request->waktu;
        $barangKeluar->jumlah_keluar = $request->jumlah;

        $stok_akhir_baru = $stok->stok_akhir - $request->jumlah;
        DB::table('stock')->where('id_barang', '=', $request->namaBarang)->update(['stok_akhir' => $stok_akhir_baru]);

        $history = new History();
        $userInfo = Auth::user();
        $history->id_user = $userInfo->id;
        $history->detail_history = 'Menambahkan data "' . $barangKeluar->nama_barang . '" pada barang keluar';
        $history->save();

        $barangKeluar->save();

        return redirect()->route('admin.barang-keluar')->with('tertambah', 'Barang Masuk berhasil ditambahkan');
    }

    public function userStore(Request $request)
    {
        $barangKeluar = new BarangKeluar();
        
        $namaBarang = DB::table('barang')->select('nama_barang')->where('id', '=', $request->namaBarang)->first();
        $stok = DB::table('stock')->select('stok_akhir')->where('id_barang', '=', $request->namaBarang)->first();
        $barangKeluar->uuid = Str::uuid();
        $barangKeluar->id_barang = $request->namaBarang;
        $barangKeluar->nama_barang = $namaBarang->nama_barang;
        $barangKeluar->kode_barang = $request->kodeBarang;
        $barangKeluar->satuan = $request->satuan;
        $barangKeluar->waktu_keluar = $request->waktu;
        $barangKeluar->jumlah_keluar = $request->jumlah;

        $stok_akhir_baru = $stok->stok_akhir - $request->jumlah;
        DB::table('stock')->where('id_barang', '=', $request->namaBarang)->update(['stok_akhir' => $stok_akhir_baru]);

        $history = new History();
        $userInfo = Auth::user();
        $history->id_user = $userInfo->id;
        $history->detail_history = 'Menambahkan data "' . $barangKeluar->nama_barang . '" pada barang keluar';
        $history->save();

        $barangKeluar->save();

        return redirect()->route('user.barang-keluar')->with('tertambah', 'Barang Masuk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $idBarang = BarangKeluar::whereUuid($uuid)->firstOrFail();
        return view('admin.editBarangKeluar', compact('idBarang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barang = BarangKeluar::find($id);
        $barang->nama_barang = $request->namaBarang;
        $barang->kode_barang = $request->kodeBarang;
        $barang->satuan = $request->satuan;
        $barang->jumlah_keluar = $request->jumlah;
        $barang->waktu_keluar = $request->waktu;
        $barang->update();

        $history = new History();
        $userInfo = Auth::user();
        $history->id_user = $userInfo->id;
        $history->detail_history = 'Memperbarui data "' . $barang->nama_barang . '" pada barang masuk';
        $history->save();

        return redirect()->route('admin.barang-keluar')->with('terbarui', 'Data Berhasil di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idBarang = BarangKeluar::find($id);
        $history = new History();
        $userInfo = Auth::user();
        $history->id_user = $userInfo->id;
        $history->detail_history = 'Menghapus "' . $idBarang->nama_barang . '" pada data barang masuk';
        $history->save();
        $idBarang->delete();

        return redirect()->route('admin.barang-keluar')->with('terhapus', 'Data Berhasil dihapus');
    }

    public function getProductDetails($id) {
        $productDetail = DB::table('barang')
        ->select('id', 'kode_barang', 'satuan')
        ->where('id', '=', $id)
        ->first();

        return response()->json([
            'kode_barang' => $productDetail->kode_barang,
            'satuan' => $productDetail->satuan
        ]);
    }
}
