<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\User;
use App\Models\LogAktivitas;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allRecords = User::select('users.id', 'users.uuid', 'users.name', 'users.ttl', 'users.image_url', 'users.gender')
        ->get();
        // dd($allRecords);
        return view('admin.daftarAtlet', compact('allRecords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createProduk');
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
            'gambar' => 'required|image|mimes:jpeg,png,gif|max:2048',
        ]);

        $imageName = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('uploads/images'), $imageName);

        $produk = new IndexProduk();

        $produk->uuid = Str::uuid();
        $produk->nama_produk = $request->nama_produk;
        $produk->merk = $request->merk;
        $produk->model = $request->model;
        $produk->kapasitas = $request->kapasitas;
        $produk->tahun = $request->tahun;
        $produk->negara = $request->negara;
        $produk->gambar = 'uploads/images/' . $imageName;
        $produk->harga = $request->harga;
        $produk->save();

        $stok = new Stok();
        $stok->id = Str::uuid();
        $stok->id_produk = $produk->id;
        $stok->stok_awal = $request->stok_awal;
        $stok->stok_akhir = $request->stok_awal;
        $stok->save();

        $log = new LogAktivitas();
        $userInfo = Auth::user();
        $log->id_user = $userInfo->id;
        $log->detail_aktivitas = 'Menambahkan ' . $request->nama_produk . ' pada data produk';
        $log->save();

        return redirect()->route('admin.daftar-produk')->with('added', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = User::whereUuid($id)->firstOrFail();
        $prestasi = DB::table('prestasi')->where('user_id', $id)->get();
        $jadwal = DB::table('jadwal')->where('user_id', $id)->get();
        // dd($allRecords);
        return view('admin.detilAtlet', compact(['record', 'jadwal', 'prestasi']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $idProduk = IndexProduk::whereUuid($uuid)->firstOrFail();
        return view('admin.editProduk', compact('idProduk'));
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
        $user = User::whereUuid($id)->firstOrFail();

        if ($request->image != null) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,gif|max:2048',
            ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/images'), $imageName);
            $user->image = 'uploads/images/' . $imageName;
        }

        $user->name = $request->name;
        $user->ttl = $request->ttl;
        $user->gender = $request->gender;
        $user->unit = $request->unit;
        $user->tmt = $request->tmt;
        $user->penempatan = $request->penempatan;
        $user->update();

        return redirect()->route('admin.daftar-atlet')->with('updated', 'Data Berhasil di perbarui');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idBarang = User::whereUuid($id)->firstOrFail();
        $idBarang->delete();

        return redirect()->route('admin.daftar-atlet')->with('deleted', 'Data Berhasil dihapus');
    }
}
