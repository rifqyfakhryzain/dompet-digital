<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">Tambah Transaksi</h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto">
        <div class="bg-white p-6 rounded-lg shadow">
            <form method="POST" action="{{ route('transaksi.store') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm">Jenis</label>
                    <select name="jenis" class="w-full border rounded p-2">
                        <option value="pemasukan">Pemasukan</option>
                        <option value="pengeluaran">Pengeluaran</option>
                    </select>
                    @error('jenis')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
                    <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" class="form-control"
                        value="{{ old('tanggal', $transaksi->tanggal ?? '') }}" required>
                </div>


                <div>
                    <label class="block text-sm">Metode</label>
                    <select name="metode" class="w-full border rounded p-2">
                        <option value="tunai">Tunai</option>
                        <option value="transfer">Transfer</option>
                    </select>
                    @error('metode')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm">Jumlah</label>
                    <input type="text" id="jumlah_tampil" class="w-full border rounded p-2" required
                        oninput="formatRibuan(this)">
                    <input type="hidden" name="jumlah" id="jumlah_asli">
                    @error('jumlah')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <script>
                    function formatRibuan(input) {
                        // Simpan posisi kursor sebelum format
                        const selectionStart = input.selectionStart;
                        const selectionEnd = input.selectionEnd;
                        const oldLength = input.value.length;

                        // Ambil angka murni
                        let value = input.value.replace(/\D/g, '');
                        if (value === '') {
                            document.getElementById("jumlah_asli").value = '';
                            input.value = '';
                            return;
                        }

                        // Format angka dengan pemisah ribuan
                        let formatted = new Intl.NumberFormat('id-ID').format(value);
                        input.value = formatted;
                        document.getElementById("jumlah_asli").value = value;

                        // Hitung selisih panjang setelah diformat
                        const newLength = formatted.length;
                        const diff = newLength - oldLength;

                        // Kembalikan posisi kursor agar tetap nyaman saat edit
                        input.setSelectionRange(selectionStart + diff, selectionEnd + diff);
                    }
                </script>


                <div>
                    <label class="block text-sm">Keterangan (opsional)</label>
                    <input type="text" name="keterangan" class="w-full border rounded p-2">
                </div>

                <div class="flex gap-2">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                    <a href="{{ route('transaksi.index') }}" class="px-4 py-2 bg-gray-200 rounded">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
