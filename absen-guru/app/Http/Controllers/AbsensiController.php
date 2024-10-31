<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensiHariIni = Absensi::where('user_id', Auth::id())->whereDate('created_at', now())->first();
        return view('guru.dashboard', compact('absensiHariIni'));
    }

    public function store(Request $request)
    {
        $absensi = Absensi::firstOrCreate(
            ['user_id' => Auth::id(), 'created_at' => now()->format('Y-m-d')],
            ['waktu_masuk' => now()]
        );

        if ($absensi->waktu_pulang == null && $request->has('pulang')) {
            $absensi->update(['waktu_pulang' => now()]);
        }

        return redirect()->back()->with('status', 'Absensi berhasil');
    }
}
