<?php

namespace App\Http\Controllers;

use App\Models\IndexProduk;
use App\Models\LogAktivitas;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index() {

        $transaksi = DB::table('transaksi')
        ->join('produk', 'transaksi.id_produk', '=', 'produk.id')
        ->select('transaksi.id', 'transaksi.tanggal_awal_sewa', 'transaksi.user_id', 'transaksi.tanggal_akhir_sewa', 'transaksi.tanggal_pengembalian', 'transaksi.status_pembayaran', 'transaksi.tanggal_pembayaran', 'transaksi.tanggal_dikirim', 'transaksi.alamat_pengiriman', 'transaksi.status_pengiriman', 'produk.nama_produk as nama_produk')
        ->get();
        return view('admin.transaksi', compact('transaksi'));
    }

    public function history() {
        return view('admin.historyTransaksi');
    }

    public function rent($id) {
        $produk = IndexProduk::find($id);
        return view('user.newTransaksi', compact('produk'));
    }

    public function store(Request $request) {
        $transaksi = new Transaksi();

        $transaksi->user_id = $request->user_id;
        $transaksi->id_produk = $request->id_produk;
        $transaksi->tanggal_awal_sewa = $request->tanggal_awal;
        $transaksi->tanggal_akhir_sewa = $request->tanggal_akhir;
        $transaksi->tanggal_pengembalian = '0';
        $transaksi->status_pembayaran = 'P';
        $transaksi->tanggal_pembayaran = '0';
        $transaksi->tanggal_dikirim = '0';
        $transaksi->alamat_pengiriman = $request->alamat;
        $transaksi->status_pengiriman = 'P';

        $stok = DB::table('stock')->select('stock.stok_akhir')->where('id_produk', '=', $request->id_produk)->first();
        $stok_akhir_baru = $stok->stok_akhir - 1;
        DB::table('stock')->where('id_produk', '=', $request->id_produk)->update(['stok_akhir' => $stok_akhir_baru]);

        $transaksi->save();

        return redirect()->route('user.dashboard')->with('tertambah', 'Pesanan anda berhasil, menunggu konfirmasi.');
    }


    public function myTransaction() {
        $userInfo = Auth::user();
        $transaksi = DB::table('transaksi')
        ->join('produk', 'transaksi.id_produk', '=', 'produk.id')
        ->select('transaksi.tanggal_awal_sewa', 'transaksi.tanggal_akhir_sewa', 'transaksi.status_pembayaran', 'transaksi.alamat_pengiriman', 'transaksi.status_pengiriman', 'produk.nama_produk as nama_produk')
        ->where('transaksi.user_id', '=', $userInfo->id)
        ->get();
        return view('user.transaksiSaya', compact('transaksi'));
    }

    public function show($id) {
        $transaksi = Transaksi::find($id);
        $user = User::find($transaksi->user_id);
        $produk = IndexProduk::find($transaksi->id_produk);

        return view('admin.editTransaksi', compact(['transaksi', 'user', 'produk']));
    }

    public function update(Request $request, $id) {

        $transaksi = Transaksi::find($id);
        $transaksi->tanggal_awal_sewa = $request->tanggal_awal_sewa;
        $transaksi->tanggal_akhir_sewa = $request->tanggal_akhir_sewa;
        $transaksi->tanggal_pengembalian = $request->tanggal_pengembalian;
        $transaksi->status_pembayaran = $request->status_pembayaran;
        $transaksi->tanggal_pembayaran = $request->tanggal_pembayaran;
        $transaksi->tanggal_dikirim = $request->tanggal_dikirim;
        $transaksi->alamat_pengiriman = $request->alamat_pengiriman;
        $transaksi->status_pengiriman = $request->status_pengiriman;
        $transaksi->update();

        return redirect()->route('admin.transaksi')->with('terubah', 'Pesanan berhasil di update.');
    }
}
