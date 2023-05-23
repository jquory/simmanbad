<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\IndexBarang;
use Illuminate\Http\Request;
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
        $allRecords = DB::table('barang_masuk')->select('kode_barang', 'nama_barang', 'jumlah_masuk', 'satuan', 'waktu_masuk')->get();;

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

        $namaBarang = DB::table('barang')->select('nama_barang')->where('id', '=', $request->namaBarang)->get();

        $barangMasuk->id = Str::uuid();
        $barangMasuk->id_barang = $request->namaBarang;
        $barangMasuk->nama_barang = $namaBarang;
        $barangMasuk->kode_barang = $request->kodeBarang;
        $barangMasuk->satuan = $request->satuan;
        $barangMasuk->waktu_masuk = $request->waktu;
        $barangMasuk->jumlah_masuk = $request->jumlah;

        $barangMasuk->save();

        return redirect()->route('admin.barang-masuk')->with('added', 'Barang Masuk berhasil ditambahkan');
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
