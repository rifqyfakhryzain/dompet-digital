<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $userId = $request->user()->id;

        $query = Transaksi::where('id_pengguna', $userId)
        ->latest('tanggal_transaksi');

        // Filter
        if($request->filled('jenis'))
        {
            $query->where('jenis',$request->jenis);
        }
        if($request->filled('metode'))
        {
            $query->where('metode', $request->metode);
        }
        if($request->filled('dari'))
        {
            $query->whereDate('tanggal_transaksi', '>=', $request->dari);
        }
        if($request->filled('sampai'))
        {
            $query->whereDate('tanggal_transaksi', '<=', $request->sampai);
        }

        $data = $query->paginate(10)->withQueryString();

        return view('transaksi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $valid = $request->validate(
            [
                'jenis'  => ['required', Rule::in(['pemasukan','pengeluaran'])],
                'metode' => ['required', Rule::in(['tunai','transfer'])],
                'jumlah' => ['required','numeric','min:0.01'],
                'keterangan' => ['nullable','string','max:255'],
                'tanggal_transaksi' => ['required', 'date'],
            ]
        );

        $valid['id_pengguna'] = $request->user()->id;
        Transaksi::create($valid);
        
        return redirect()->route('transaksi.index')->with('sukses', 'transaksi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi, Request $request)
    {
        //
        $this->authorizeTransaksi($transaksi, $request->user()->id);

        return view('transaksi.edit', compact('transaksi'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
        $this->authorizeTransaksi($transaksi, $request->user()->id);
                $valid = $request->validate(
            [
                'jenis'  => ['required', Rule::in(['pemasukan','pengeluaran'])],
                'metode' => ['required', Rule::in(['tunai','transfer'])],
                'jumlah' => ['required','numeric','min:0.01'],
                'keterangan' => ['nullable','string','max:255'],
                'tanggal_transaksi' => ['required', 'date'],

            ]
        );

        $transaksi->update($valid);
        
        return redirect()->route('transaksi.index')->with('sukses', 'transaksi berhasil diperbarui');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi, Request $request)
    {
        //
        $this->authorizeTransaksi($transaksi, $request->user()->id);

        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('sukses', 'transaksi dihapus');
    }

    private function authorizeTransaksi(Transaksi $transaksi, int $userId): void
    {
        abort_if($transaksi->id_pengguna !== $userId, 403, 'akses ditolak');
    }
}
