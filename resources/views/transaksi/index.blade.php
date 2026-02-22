<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Riwayat Transaksi</h2>
                <p class="text-sm text-slate-500">Kelola dan pantau semua catatan keuangan Anda.</p>
            </div>
            <a href="{{ route('transaksi.create') }}"
                class="inline-flex items-center justify-center px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-2xl shadow-lg shadow-emerald-200 transition-all active:scale-95 gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Tambah Transaksi
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-slate-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if (session('sukses'))
                <div
                    class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl flex items-center gap-3 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-bold text-sm">{{ session('sukses') }}</span>
                </div>
            @endif

            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 mb-8">
                <form method="GET" class="grid gap-4 sm:grid-cols-2 md:grid-cols-5">
                    <div>
                        <label
                            class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Jenis</label>
                        <select name="jenis"
                            class="w-full border-slate-200 rounded-xl focus:border-emerald-500 focus:ring-emerald-500/10 text-sm font-semibold text-slate-700">
                            <option value="">Semua Jenis</option>
                            <option value="pemasukan" @selected(request('jenis') === 'pemasukan')>Pemasukan</option>
                            <option value="pengeluaran" @selected(request('jenis') === 'pengeluaran')>Pengeluaran</option>
                        </select>
                    </div>
                    <div>
                        <label
                            class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Metode</label>
                        <select name="metode"
                            class="w-full border-slate-200 rounded-xl focus:border-emerald-500 focus:ring-emerald-500/10 text-sm font-semibold text-slate-700">
                            <option value="">Semua Metode</option>
                            <option value="tunai" @selected(request('metode') === 'tunai')>Tunai</option>
                            <option value="transfer" @selected(request('metode') === 'transfer')>Transfer</option>
                        </select>
                    </div>
                    <div>
                        <label
                            class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Dari</label>
                        <input type="date" name="dari" value="{{ request('dari') }}"
                            class="w-full border-slate-200 rounded-xl focus:border-emerald-500 focus:ring-emerald-500/10 text-sm font-semibold text-slate-700" />
                    </div>
                    <div>
                        <label
                            class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Sampai</label>
                        <input type="date" name="sampai" value="{{ request('sampai') }}"
                            class="w-full border-slate-200 rounded-xl focus:border-emerald-500 focus:ring-emerald-500/10 text-sm font-semibold text-slate-700" />
                    </div>
                    <div class="flex items-end">
                        <button
                            class="w-full py-2.5 bg-slate-900 hover:bg-black text-white font-bold rounded-xl transition-all shadow-lg shadow-slate-200">
                            Terapkan Filter
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto p-4">
                    <table class="w-full text-left border-separate border-spacing-y-3">
                        <thead>
                            <tr class="text-slate-400 text-xs uppercase tracking-[0.15em]">
                                <th class="px-6 py-3 font-semibold text-center">Tgl</th>
                                <th class="px-6 py-3 font-semibold">Deskripsi</th>
                                <th class="px-6 py-3 font-semibold text-center">Metode</th>
                                <th class="px-6 py-3 font-semibold text-right">Jumlah</th>
                                <th class="px-6 py-3 font-semibold text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $t)
                                <tr class="group hover:bg-slate-50/80 transition-all">
                                    <td class="px-6 py-4 bg-white rounded-l-2xl border-y border-l border-slate-50">
                                        <div class="text-sm font-bold text-slate-700 text-center">
                                            {{ \Carbon\Carbon::parse($t->tanggal_transaksi)->translatedFormat('d') }}
                                            <span
                                                class="block text-[10px] text-slate-400 font-medium uppercase tracking-tighter">
                                                {{ \Carbon\Carbon::parse($t->tanggal_transaksi)->translatedFormat('M Y') }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 bg-white border-y border-slate-50">
                                        <p class="text-sm font-bold text-slate-800 capitalize leading-tight">
                                            {{ $t->keterangan ?? 'Tanpa Keterangan' }}</p>
                                        <span
                                            class="text-[10px] px-2 py-0.5 rounded-full {{ $t->jenis === 'pemasukan' ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }} font-bold uppercase tracking-wide">
                                            {{ $t->jenis }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 bg-white border-y border-slate-50 text-center">
                                        <span
                                            class="text-xs font-semibold text-slate-600 bg-slate-100 px-3 py-1 rounded-lg">
                                            {{ $t->metode }}
                                        </span>
                                    </td>
                                    <td
                                        class="px-6 py-4 bg-white border-y border-slate-50 text-right font-extrabold {{ $t->jenis === 'pemasukan' ? 'text-emerald-600' : 'text-rose-600' }}">
                                        Rp {{ number_format($t->jumlah, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 bg-white rounded-r-2xl border-y border-r border-slate-50">
                                        <div class="flex justify-center items-center gap-2">
                                            <a href="{{ route('transaksi.edit', $t) }}"
                                                class="p-2 text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-xl transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                            <form method="POST" action="{{ route('transaksi.destroy', $t) }}"
                                                onsubmit="return confirm('Hapus transaksi ini?')">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                    class="p-2 text-rose-600 bg-rose-50 hover:bg-rose-100 rounded-xl transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-12 text-center text-slate-400">
                                        Data transaksi tidak ditemukan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-8">
                {{ $data->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
