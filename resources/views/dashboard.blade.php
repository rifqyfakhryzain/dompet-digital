<x-app-layout>
    <x-slot name="header">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-800 tracking-tight">
                    {{ __('Ringkasan Keuangan') }}
                </h2>
                <p class="text-sm text-slate-500">Pantau arus kas Anda hari ini.</p>
            </div>
            <div>
                <span class="inline-flex items-center px-4 py-2 bg-emerald-50 text-emerald-700 text-xs font-bold rounded-full border border-emerald-100 uppercase tracking-widest">
                    Akun Terverifikasi
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-10 bg-slate-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- 3 Cards Ringkasan dengan Gaya Glassmorphism Ringan --}}
            <div class="grid gap-6 md:grid-cols-3">
                
                {{-- Card Saldo (Utama) --}}
                <div class="relative overflow-hidden bg-gradient-to-br from-slate-900 to-slate-800 p-8 rounded-[2rem] shadow-xl shadow-slate-200">
                    <div class="absolute top-0 right-0 p-4 opacity-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <p class="text-slate-400 text-sm font-medium mb-1">Saldo Tersedia</p>
                    <h3 class="text-3xl font-extrabold text-white tracking-tight">
                        Rp {{ number_format($saldo, 0, ',', '.') }}
                    </h3>
                    <div class="mt-6 flex items-center gap-2">
                        <span class="flex h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span class="text-xs text-slate-300">Aktif & Aman</span>
                    </div>
                </div>

                {{-- Card Pemasukan --}}
                <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100 hover:shadow-md transition duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="p-3 bg-emerald-50 rounded-2xl text-emerald-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
                            </svg>
                        </div>
                        <p class="text-slate-500 text-sm font-semibold uppercase tracking-wider">Pemasukan</p>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800">
                        Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
                    </h3>
                </div>

                {{-- Card Pengeluaran --}}
                <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100 hover:shadow-md transition duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="p-3 bg-rose-50 rounded-2xl text-rose-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6" />
                            </svg>
                        </div>
                        <p class="text-slate-500 text-sm font-semibold uppercase tracking-wider">Pengeluaran</p>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800">
                        Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
                    </h3>
                </div>
            </div>

            {{-- Tabel Transaksi --}}
            <div class="mt-10 bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-8 border-b border-slate-50 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-slate-800">Transaksi Terbaru</h3>
                    <button class="text-sm font-bold text-emerald-600 hover:text-emerald-700">Lihat Semua</button>
                </div>
                
                <div class="overflow-x-auto p-4">
                    <table class="w-full text-left border-separate border-spacing-y-3">
                        <thead>
                            <tr class="text-slate-400 text-xs uppercase tracking-[0.15em]">
                                <th class="px-6 py-3 font-semibold">Tanggal</th>
                                <th class="px-6 py-3 font-semibold">Detail</th>
                                <th class="px-6 py-3 font-semibold text-center">Metode</th>
                                <th class="px-6 py-3 font-semibold text-right">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($terbaru as $t)
                                <tr class="group hover:bg-slate-50/80 transition-all">
                                    <td class="px-6 py-4 bg-white rounded-l-2xl border-y border-l border-slate-50 group-hover:border-emerald-100">
                                        <span class="text-sm font-bold text-slate-700 block">
                                            {{ \Carbon\Carbon::parse($t->tanggal_transaksi)->translatedFormat('d') }}
                                        </span>
                                        <span class="text-xs text-slate-400 uppercase">
                                            {{ \Carbon\Carbon::parse($t->tanggal_transaksi)->translatedFormat('M Y') }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 bg-white border-y border-slate-50 group-hover:border-emerald-100">
                                        <p class="text-sm font-bold text-slate-800 capitalize">{{ $t->keterangan ?? 'Transaksi' }}</p>
                                        <span class="text-[10px] px-2 py-0.5 rounded-full {{ $t->jenis === 'pemasukan' ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }} font-bold uppercase tracking-wide">
                                            {{ $t->jenis }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 bg-white border-y border-slate-50 group-hover:border-emerald-100 text-center">
                                        <span class="text-xs font-semibold text-slate-600 bg-slate-100 px-3 py-1 rounded-lg uppercase">
                                            {{ $t->metode }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 bg-white rounded-r-2xl border-y border-r border-slate-50 group-hover:border-emerald-100 text-right">
                                        <span class="text-sm font-extrabold {{ $t->jenis === 'pemasukan' ? 'text-emerald-600' : 'text-rose-600' }}">
                                            {{ $t->jenis === 'pemasukan' ? '+' : '-' }} Rp {{ number_format($t->jumlah, 0, ',', '.') }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-slate-200 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <p class="text-slate-400 font-medium">Belum ada transaksi bulan ini.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>