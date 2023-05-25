<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allRecords = DB::table('barang_masuk')
        ->select('id', 'uuid', 'kode_barang', 'nama_barang', 'jumlah_masuk', 'satuan', 'waktu_masuk')
        ->orderBy('id', 'desc')
        ->get();;

        return view('admin.barangMasuk', compact('allRecords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = DB::table('barang')
        ->select('id', 'nama_barang')
        ->orderBy('id', 'desc')
        ->get();
        return view('admin.createBarangMasuk', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barangMasuk = new BarangMasuk();

        $namaBarang = DB::table('barang')->select('nama_barang')->where('id', '=', $request->namaBarang)->first();

        $barangMasuk->uuid = Str::uuid();
        $barangMasuk->id_barang = $request->namaBarang;
        $barangMasuk->nama_barang = $namaBarang->nama_barang;
        $barangMasuk->kode_barang = $request->kodeBarang;
        $barangMasuk->satuan = $request->satuan;
        $barangMasuk->waktu_masuk = $request->waktu;
        $barangMasuk->jumlah_masuk = $request->jumlah;

        $history = new History();
        $userInfo = Auth::user();
        $history->id_user = $userInfo->id;
        $history->detail_history = 'Menambahkan data "' . $barangMasuk->nama_barang . '" pada barang masuk';
        $history->save();

        $barangMasuk->save();

        return redirect()->route('admin.barang-masuk')->with('ditambahkan', 'Barang Masuk berhasil ditambahkan');
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
        $idBarang = BarangMasuk::whereUuid($uuid)->firstOrFail();
        return view('admin.editBarangMasuk', compact('idBarang'));
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
        $barang = BarangMasuk::find($id);
        $barang->nama_barang = $request->namaBarang;
        $barang->kode_barang = $request->kodeBarang;
        $barang->satuan = $request->satuan;
        $barang->jumlah_masuk = $request->jumlah;
        $barang->waktu_masuk = $request->waktu;
        $barang->update();

        $history = new History();
        $userInfo = Auth::user();
        $history->id_user = $userInfo->id;
        $history->detail_history = 'Memperbarui data "' . $barang->nama_barang . '" pada barang masuk';
        $history->save();

        return redirect()->route('admin.barang-masuk')->with('masukUpdated', 'Data Berhasil di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idBarang = BarangMasuk::find($id);
        $history = new History();
        $userInfo = Auth::user();
        $history->id_user = $userInfo->id;
        $history->detail_history = 'Menghapus ' . $idBarang->nama_barang . ' pada data barang masuk';
        $history->save();
        $idBarang->delete();

        return redirect()->route('admin.barang-masuk')->with('masukDeleted', 'Data Berhasil dihapus');
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
