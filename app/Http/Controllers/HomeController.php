<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function dashboardUser() {
        return view('user.dashboard');
    }

    public function dashboardAdmin() {
        $currentYear = date('Y');
        $recordsKeluar = DB::table('barang_keluar')->selectRaw("TO_CHAR(DATE_TRUNC('month', created_at), 'Month') AS month_name, COUNT(*) AS count")
        ->whereYear('created_at', $currentYear)
        ->groupByRaw("TO_CHAR(DATE_TRUNC('month', created_at), 'Month')")
        ->get();
        $recordsMasuk = DB::table('barang_masuk')->selectRaw("TO_CHAR(DATE_TRUNC('month', created_at), 'Month') AS month_name, COUNT(*) AS count")
        ->whereYear('created_at', $currentYear)
        ->groupByRaw("TO_CHAR(DATE_TRUNC('month', created_at), 'Month')")
        ->get();

        $akunterakhir = DB::table('users')->latest()->take(5)->get();
        $totaladmin = DB::table('users')->whereIn('role', ['admin'])->count();
        $totaluser = DB::table('users')->whereIn('role', ['user'])->count();
        $totalhistory = DB::table('history')->count();
        $totalbarang = DB::table('barang')->count();
        $totalbarangkeluar = DB::table('barang_keluar')->count();
        $totalbarangmasuk = DB::table('barang_masuk')->count();

        $historyterakhir = DB::table('history')
        ->join('users', 'history.id_user', '=', 'users.id')
        ->select('history.*', 'users.name', 'users.image_url')
        ->orderBy('history.created_at', 'desc')
        ->latest()
        ->take(4)
        ->get();

        return view('admin.dashboard', compact([
            'totalhistory',
            'totalbarang',
            'totalbarangkeluar',
            'totalbarangmasuk',
            'akunterakhir', 
            'historyterakhir',
            'totaluser',
            'totaladmin',
            'recordsKeluar',
            'recordsMasuk'
        ]));
    }
}
