<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(Request $request )
    {
        $userId = $request->user()->id;
        
        $totalPemasukan = Transaksi::where('id_pengguna', $userId)
        ->where('jenis','pemasukan')
        ->sum('jumlah');

        $totalPengeluaran = Transaksi::where('id_pengguna', $userId)
        ->where('jenis','pengeluaran')
        ->sum('jumlah');

        $saldo = $totalPemasukan - $totalPengeluaran;

        $terbaru = Transaksi::where('id_pengguna', $userId)
        ->latest('created_at')
        ->take(5)
        ->get();

        return view('dashboard',
        [
            'saldo' => $saldo,
            'totalPemasukan' => $totalPemasukan,
            'totalPengeluaran' => $totalPengeluaran,
            'terbaru' => $terbaru
        ]);
    }
}
