<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">Edit Transaksi</h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto">
        <div class="bg-white p-6 rounded-lg shadow">
            <form method="POST" action="{{ route('transaksi.update', $transaksi) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm">Jenis</label>
                    <select name="jenis" class="w-full border rounded p-2">
                        <option value="pemasukan" @selected($transaksi->jenis === 'pemasukan')>Pemasukan</option>
                        <option value="pengeluaran" @selected($transaksi->jenis === 'pengeluaran')>Pengeluaran</option>
                    </select>
                    @error('jenis') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                </div>

                <div>
                    <label class="block text-sm">Tanggal Transaksi</label>
                    <input type="date" name="tanggal_transaksi" 
                           value="{{ old('tanggal_transaksi', $transaksi->tanggal_transaksi) }}" 
                           class="w-full border rounded p-2" required>
                    @error('tanggal_transaksi') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                </div>

                <div>
                    <label class="block text-sm">Metode</label>
                    <select name="metode" class="w-full border rounded p-2">
                        <option value="tunai" @selected($transaksi->metode === 'tunai')>Tunai</option>
                        <option value="transfer" @selected($transaksi->metode === 'transfer')>Transfer</option>
                    </select>
                    @error('metode') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                </div>

<div>
    <label class="block text-sm">Jumlah</label>
    <input 
        type="text" 
        id="jumlah_tampil" 
        class="w-full border rounded p-2" 
        value="{{ number_format(old('jumlah', $transaksi->jumlah), 0, ',', '.') }}" 
        required
    >
    <input type="hidden" name="jumlah" id="jumlah_asli" value="{{ old('jumlah', $transaksi->jumlah) }}">
    @error('jumlah')
        <div class="text-red-600 text-sm">{{ $message }}</div>
    @enderror
</div>

<script>
    const tampil = document.getElementById("jumlah_tampil");
    const asli = document.getElementById("jumlah_asli");

    tampil.addEventListener("input", function() {
        // Simpan posisi kursor sebelum diformat
        const start = this.selectionStart;
        const end = this.selectionEnd;
        const oldLength = this.value.length;

        // Ambil angka murni
        let value = this.value.replace(/\D/g, "");
        if (!value) {
            asli.value = "";
            this.value = "";
            return;
        }

        // Format ribuan
        const formatted = new Intl.NumberFormat("id-ID").format(value);
        this.value = formatted;
        asli.value = value;

        // Hitung selisih panjang dan kembalikan posisi kursor
        const newLength = formatted.length;
        const diff = newLength - oldLength;
        this.setSelectionRange(start + diff, end + diff);
    });
</script>


                <div>
                    <label class="block text-sm">Keterangan (opsional)</label>
                    <input type="text" name="keterangan" 
                           value="{{ old('keterangan', $transaksi->keterangan) }}" 
                           class="w-full border rounded p-2">
                </div>

                <div class="flex gap-2">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
                    <a href="{{ route('transaksi.index') }}" class="px-4 py-2 bg-gray-200 rounded">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
