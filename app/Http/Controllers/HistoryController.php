<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index() {

        $allRecords = DB::table('history')
        ->join('users', 'history.id_user', '=', 'users.id')
        ->select('history.id', 'history.detail_history', 'history.created_at', 'users.name', 'users.image_url')
        // ->orderBy('history.id', 'asc')
        ->orderBy('history.created_at', 'desc')
        ->get();

        return view('admin.history', compact('allRecords'));
    }
}
