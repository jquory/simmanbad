<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogAktivitasController extends Controller
{
    public function index() {

        $allRecords = DB::table('log_aktivitas')
        ->join('users', 'log_aktivitas.id_user', '=', 'users.id')
        ->select('log_aktivitas.id', 'log_aktivitas.detail_aktivitas', 'log_aktivitas.created_at', 'users.name', 'users.image_url')
        //->orderBy('log_aktivitas.id', 'asc')
        ->orderBy('log_aktivitas.created_at', 'desc')
        ->get();

        return view('admin.logAktivitas', compact('allRecords'));
    }
}
