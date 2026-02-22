<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('transaksi.index') }}" class="p-2 bg-white border border-slate-200 rounded-xl text-slate-400 hover:text-emerald-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
            <div>
                <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Edit Transaksi</h2>
                <p class="text-sm text-slate-500">Perbarui rincian catatan keuangan Anda.</p>
            </div>
        </div>
    </x-slot>

    <div class="py-10 bg-slate-50/50 min-h-screen">
        <div class="max-w-xl mx-auto px-4">
            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100">
                <form method="POST" action="{{ route('transaksi.update', $transaksi) }}" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    {{-- Jenis Transaksi (Radio Card Style) --}}
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] mb-2 ml-1">Jenis Transaksi</label>
                        <div class="grid grid-cols-2 gap-3">
                            <label class="relative">
                                <input type="radio" name="jenis" value="pemasukan" class="peer sr-only" @checked($transaksi->jenis === 'pemasukan')>
                                <div class="flex items-center justify-center p-3 border border-slate-100 rounded-2xl cursor-pointer peer-checked:border-emerald-500 peer-checked:bg-emerald-50 peer-checked:text-emerald-700 hover:bg-slate-50 transition-all font-bold text-sm text-slate-600">
                                    Pemasukan
                                </div>
                            </label>
                            <label class="relative">
                                <input type="radio" name="jenis" value="pengeluaran" class="peer sr-only" @checked($transaksi->jenis === 'pengeluaran')>
                                <div class="flex items-center justify-center p-3 border border-slate-100 rounded-2xl cursor-pointer peer-checked:border-rose-500 peer-checked:bg-rose-50 peer-checked:text-rose-700 hover:bg-slate-50 transition-all font-bold text-sm text-slate-600">
                                    Pengeluaran
                                </div>
                            </label>
                        </div>
                    </div>

                    {{-- Tanggal --}}
                    <div>
                        <label for="tanggal_transaksi" class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] mb-2 ml-1">Tanggal Transaksi</label>
                        <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" 
                               class="w-full border-slate-200 rounded-2xl focus:border-emerald-500 focus:ring focus:ring-emerald-500/10 text-sm font-semibold text-slate-700 px-4 py-3"
                               value="{{ old('tanggal_transaksi', $transaksi->tanggal_transaksi) }}" required>
                        @error('tanggal_transaksi') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Metode --}}
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] mb-2 ml-1">Metode Pembayaran</label>
                        <select name="metode" class="w-full border-slate-200 rounded-2xl focus:border-emerald-500 focus:ring focus:ring-emerald-500/10 text-sm font-semibold text-slate-700 px-4 py-3">
                            <option value="tunai" @selected($transaksi->metode === 'tunai')>Tunai / Cash</option>
                            <option value="transfer" @selected($transaksi->metode === 'transfer')>Transfer Bank</option>
                        </select>
                    </div>

                    {{-- Jumlah --}}
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] mb-2 ml-1">Jumlah Nominal (Rp)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 font-bold text-sm">
                                Rp
                            </div>
                            <input type="text" id="jumlah_tampil" 
                                   class="w-full border-slate-200 rounded-2xl focus:border-emerald-500 focus:ring focus:ring-emerald-500/10 text-lg font-extrabold text-slate-800 pl-12 py-3"
                                   value="{{ number_format($transaksi->jumlah, 0, ',', '.') }}" required>
                        </div>
                        <input type="hidden" name="jumlah" id="jumlah_asli" value="{{ $transaksi->jumlah }}">
                        @error('jumlah') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Keterangan --}}
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] mb-2 ml-1">Keterangan (Opsional)</label>
                        <input type="text" name="keterangan" 
                               value="{{ old('keterangan', $transaksi->keterangan) }}"
                               class="w-full border-slate-200 rounded-2xl focus:border-emerald-500 focus:ring focus:ring-emerald-500/10 text-sm font-semibold text-slate-700 px-4 py-3">
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex flex-col gap-3 pt-4">
                        <button type="submit" class="w-full py-4 bg-slate-900 hover:bg-black text-white font-extrabold rounded-2xl shadow-lg shadow-slate-200 transition-all active:scale-95">
                            Update Transaksi
                        </button>
                        <a href="{{ route('transaksi.index') }}" class="w-full py-4 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold rounded-2xl text-center transition-all text-sm">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const tampil = document.getElementById("jumlah_tampil");
        const asli = document.getElementById("jumlah_asli");

        tampil.addEventListener("input", function() {
            const start = this.selectionStart;
            const oldLength = this.value.length;

            let value = this.value.replace(/\D/g, "");
            if (!value) {
                asli.value = "";
                this.value = "";
                return;
            }

            const formatted = new Intl.NumberFormat("id-ID").format(value);
            this.value = formatted;
            asli.value = value;

            const newLength = formatted.length;
            const diff = newLength - oldLength;
            this.setSelectionRange(start + diff, start + diff);
        });
    </script>
</x-app-layout>