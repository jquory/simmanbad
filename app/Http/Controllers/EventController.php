<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventParticipant;
use App\Models\History;
use App\Models\ProdukKeluar;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allRecords = Event::all();

        return view('admin.daftarEvent', compact('allRecords'));
    }

    public function indexUser()
    {
        $allRecords = DB::table('produk_keluar')
        ->select('id', 'uuid', 'kode_produk', 'nama_produk', 'jumlah_keluar', 'satuan', 'waktu_keluar', 'created_at')
        ->orderBy('created_at', 'desc')
        ->get();

        return view('user.produkKeluar', compact('allRecords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createEvent');
    }

    public function userCreate()
    {
        $produk = DB::table('produk')
        ->select('id', 'nama_produk', 'created_at')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('user.createProdukKeluar', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,gif|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/images'), $imageName);

        $event = new Event();
        
        $event->name = $request->name;
        $event->tanggal = $request->tanggal;
        $event->image = 'uploads/images/' . $imageName;
        $event->detil = $request->detil;

        $event->save();

        return redirect()->route('admin.event')->with('tertambah', 'Produk Masuk berhasil ditambahkan');
    }

    public function userStore(Request $request)
    {
        $barangKeluar = new ProdukKeluar();
        
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
        $event = Event::find($id);
        $eventParticipant = DB::table('event_participant')->where('id_event', $id)->count();
        return view('admin.eventDetail', compact(['event', 'eventParticipant']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $idBarang = ProdukKeluar::whereUuid($uuid)->firstOrFail();
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
        $barang = ProdukKeluar::find($id);
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
        $event = Event::find($id);
        $event->delete();

        return redirect()->route('admin.event')->with('terhapus', 'Data Berhasil dihapus');
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

    public function follow($id)
    {
        $eventParticipant = new EventParticipant();
        $userInfo = $userInfo = Auth::user();
        
        $eventParticipant->id_event = $id;
        $eventParticipant->id_user = $userInfo->uuid;

        $eventParticipant->save();

        return redirect()->route('user.dashboard')->with('tertambah', 'Produk Masuk berhasil ditambahkan');
    }
}
