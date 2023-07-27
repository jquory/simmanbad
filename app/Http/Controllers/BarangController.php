<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\IndexBarang;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allRecords = IndexBarang::select('barang.id', 'barang.uuid', 'barang.kode_barang', 'barang.nama_barang', 'barang.spek', 'barang.satuan', 'stock.stok_awal', 'stock.stok_akhir')
    ->leftJoin('stock', 'barang.id', '=', 'stock.id_barang')
    ->orderBy('barang.id', 'DESC')
    ->get();
        return view('admin.daftarBarang', compact('allRecords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createBarang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = new IndexBarang();

        $barang->uuid = Str::uuid();
        $barang->kode_barang = $request->kodeBarang;
        $barang->nama_barang = $request->namaBarang;
        $barang->spek = $request->spesifikasi;
        $barang->satuan = $request->satuan;
        $barang->harga = $request->harga;
        $barang->save();

        $stok = new Stok();
        $stok->id = Str::uuid();
        $stok->id_barang = $barang->id;
        $stok->stok_awal = $request->stok_awal;
        $stok->stok_akhir = $request->stok_awal;
        $stok->save();

        $history = new History();
        $userInfo = Auth::user();
        $history->id_user = $userInfo->id;
        $history->detail_history = 'Menambahkan ' . $request->namaBarang . ' pada data barang';
        $history->save();

        return redirect()->route('admin.daftar-barang')->with('added', 'Data berhasil ditambahkan');
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
        $idBarang = IndexBarang::whereUuid($uuid)->firstOrFail();
        return view('admin.editBarang', compact('idBarang'));
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
        $barang = IndexBarang::find($id);
        $barang->kode_barang = $request->kodeBarang;
        $barang->nama_barang = $request->namaBarang;
        $barang->spek = $request->spesifikasi;
        $barang->satuan = $request->satuan;
        $barang->update();

        $history = new History();
        $userInfo = Auth::user();
        $history->id_user = $userInfo->id;
        $history->detail_history = 'Memperbarui ' . $request->namaBarang . ' pada data barang';
        $history->save();

        return redirect()->route('admin.daftar-barang')->with('updated', 'Data Berhasil di perbarui');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idBarang = IndexBarang::find($id);

        $history = new History();
        $userInfo = Auth::user();
        $history->id_user = $userInfo->id;
        $history->detail_history = 'Menghapus ' . $idBarang->nama_barang . ' pada data barang';
        $history->save();
        $idBarang->delete();

        return redirect()->route('admin.daftar-barang')->with('deleted', 'Data Berhasil di perbarui');
    }
}
