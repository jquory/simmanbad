<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allRecords = DB::table('jadwal')->leftJoin('users', 'jadwal.user_id', '=', 'users.uuid')
        ->select('jadwal.name as nama', 'jadwal.id', 'jadwal.tanggal', 'jadwal.status', 'users.name')
        ->get();

        // dd($allRecords);

        $user = Auth::user();
        $userRecords = DB::table('jadwal')->where('user_id', $user->uuid)->get();

        $today = Carbon::today()->toDateString();

        if ($user->role == 'user') {
            return view('user.daftarJadwal', compact(['userRecords', 'today']));
        }

        // $allRecords = Jadwal::all();
        return view('admin.daftarJadwal', compact('allRecords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('admin.createJadwal', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jadwal = new Jadwal();

        $jadwal->name = $request->name;
        $jadwal->user_id = $request->user_id;
        $jadwal->tanggal = $request->tanggal;
        $jadwal->status = 'Terjadwal';

        $jadwal->save();

        return redirect()->route('admin.jadwal')->with('ditambahkan', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadwal = Jadwal::find($id);
        $user = User::whereUuid($jadwal->user_id)->firstOrFail();
        return view('admin.editJadwal', compact(['jadwal', 'user']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $jadwal = Jadwal::find($id);
        $jadwal->name = $request->name;
        $jadwal->tanggal = $request->tanggal;
        $jadwal->update();

        return redirect()->route('admin.jadwal')->with('masukUpdated', 'Data berhasil ditambahkan');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal = Jadwal::find($id);
        $jadwal->delete();

        return redirect()->route('admin.jadwal')->with('masukDeleted', 'Data berhasil ditambahkan'); 
    }

    public function absenHadir($id)
    {
        $jadwal = Jadwal::find($id);
        $jadwal->status = 'Hadir';

        $jadwal->update();

        return redirect()->route('user.jadwal')->with('masukUpdated', 'Data berhasil ditambahkan');
    }

    public function tidakHadir($id)
    {
        $jadwal = Jadwal::find($id);

        $jadwal->status = 'Tidak Hadir';

        $jadwal->update();

        return redirect()->route('user.jadwal')->with('masukUpdated', 'Data berhasil ditambahkan');
    }
}
