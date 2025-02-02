<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allRecords = DB::table('prestasi')->leftJoin('users', 'prestasi.user_id', '=', 'users.uuid')
        ->select('prestasi.name as nama', 'prestasi.id', 'prestasi.tingkat', 'prestasi.tahun', 'prestasi.pemberi', 'users.name', 'prestasi.sertifikat')
        ->get();

        $user = Auth::user();
        $userRecords = DB::table('prestasi')->where('user_id', $user->uuid)->get();

        if ($user->role == 'user') {
            return view('user.daftarPrestasi', compact('userRecords'));
        }

        return view('admin.daftarPrestasi', compact('allRecords'));
    }

    public function indexUser()
    {
        $allRecords = DB::table('barang_masuk')
        ->select('id', 'uuid', 'kode_barang', 'nama_barang', 'jumlah_masuk', 'satuan', 'waktu_masuk')
        ->orderBy('id', 'desc')
        ->get();;

        return view('user.barangMasuk', compact('allRecords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = DB::table('users')
        ->select('uuid', 'name')
        ->get();

        $userInfo = Auth::user();

        if ($userInfo->role == 'user') {
            return view('user.createPrestasi');
        }

        return view('admin.createPrestasi', compact('user'));
    }

    public function userCreate()
    {
        $barang = DB::table('barang')
        ->select('id', 'kode_barang')
        ->orderBy('id', 'desc')
        ->get();
        return view('user.createBarangMasuk', compact('barang'));
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
        $prestasi = new Prestasi();
        $user = Auth::user();

        if ($user->role == 'user') {
            $prestasi->user_id = $user->uuid;
        } else {
            $prestasi->user_id = $request->user_id;
        }

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/images'), $imageName);

        $prestasi->name = $request->name;
        $prestasi->sertifikat = 'uploads/images/' . $imageName;
        $prestasi->tingkat = $request->tingkat;
        $prestasi->tahun = $request->tahun;
        $prestasi->pemberi = $request->pemberi;

        $prestasi->save();

        if ($user->role == 'user') {
            return redirect()->route('user.prestasi')->with('ditambahkan', 'Barang Masuk berhasil ditambahkan');
        }

        return redirect()->route('admin.prestasi')->with('ditambahkan', 'Barang Masuk berhasil ditambahkan');
    }

    public function userStore(Request $request)
    {
        $barangMasuk = new BarangMasuk();

        $namaBarang = DB::table('barang')->select('nama_barang')->where('id', '=', $request->namaBarang)->first();

        $barangMasuk->uuid = Str::uuid();
        $barangMasuk->id_barang = $request->namaBarang;
        $barangMasuk->nama_barang = $namaBarang->nama_barang;
        $barangMasuk->tingkat = $request->tingkat;
        $barangMasuk->tahun = $request->tahun;
        $barangMasuk->pemberi = $request->pemberi;

        $barangMasuk->save();

        return redirect()->route('user.barang-masuk')->with('ditambahkan', 'Barang Masuk berhasil ditambahkan');
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
        $prestasi = DB::table('prestasi')->leftJoin('users', 'prestasi.user_id', '=', 'users.uuid')
        ->select('prestasi.name as nama', 'prestasi.id', 'prestasi.tingkat', 'prestasi.tahun', 'prestasi.pemberi', 'users.name', 'prestasi.sertifikat')
        ->where('prestasi.id', '=', $id)
        ->first();

        $prestasiSingle = Prestasi::find($id);

        $user = Auth::user();

        if ($user->role == 'user') {
            return view('user.editPrestasi', compact('prestasiSingle'));
        }

        return view('admin.editPrestasi', compact('prestasi'));
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

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/images'), $imageName);

        $prestasi = Prestasi::find($id);
        $prestasi->name = $request->name;
        $prestasi->tingkat = $request->tingkat;
        $prestasi->tahun = $request->tahun;
        $prestasi->pemberi = $request->pemberi;
        
        $prestasi->sertifikat = 'uploads/images/' . $imageName;
        $prestasi->update();

        $user = Auth::user();

        if ($user->role == 'user') {
            return redirect()->route('user.prestasi')->with('masukUpdated', 'Data Berhasil di perbarui');
        }

        return redirect()->route('admin.prestasi')->with('masukUpdated', 'Data Berhasil di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestasi = Prestasi::find($id);
        $prestasi->delete();

        $user = Auth::user();

        if ($user->role == 'user') {
            return redirect()->route('user.prestasi')->with('masukDeleted', 'Data Berhasil dihapus');
        }

        return redirect()->route('admin.prestasi')->with('masukDeleted', 'Data Berhasil dihapus');
    }


    public function getProductDetails($id) {
        $productDetail = DB::table('barang')
        ->select('id', 'nama_barang', 'satuan', 'kode_barang')
        ->where('id', '=', $id)
        ->first();

        return response()->json([
            'nama_barang' => $productDetail->nama_barang,
            'satuan' => $productDetail->satuan,
            'kode_barang' => $productDetail->kode_barang
        ]);
    }

    public function getPdfPrestasi()
    {
        $data = DB::table('prestasi')->leftJoin('users', 'prestasi.user_id', '=', 'users.uuid')
        ->select('prestasi.name as nama', 'prestasi.id', 'prestasi.tingkat', 'prestasi.tahun', 'prestasi.pemberi', 'users.name', 'prestasi.sertifikat')
        ->get();
        $pdf = Pdf::loadView('admin.reportPrestasi', compact('data'))->setPaper('A4', 'landscape');
        return $pdf->stream('prestasi.pdf');
    }
}
