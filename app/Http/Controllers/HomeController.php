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
        $records = DB::table('users')->selectRaw("TO_CHAR(DATE_TRUNC('month', created_at), 'Month') AS month_name, COUNT(*) AS count")
        ->whereYear('created_at', $currentYear)
        ->groupByRaw("TO_CHAR(DATE_TRUNC('month', created_at), 'Month')")
        ->get();
        $jsonData = json_encode($records);
        return view('admin.dashboard')->with('jsonData', $jsonData);
    }
}
