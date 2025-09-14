<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight">Transaksi</h2>
            <a href="{{ route('transaksi.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Tambah</a>
        </div>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">
        @if (session('sukses'))
            <div class="mb-4 p-3 bg-green-50 text-green-700 rounded">{{ session('sukses') }}</div>
        @endif

        <!-- Filter -->
        <form method="GET" class="bg-white p-4 rounded-lg shadow grid gap-3 mb-4 sm:grid-cols-2 md:grid-cols-5">
            <select name="jenis" class="border rounded p-2">
                <option value="">Semua Jenis</option>
                <option value="pemasukan" @selected(request('jenis') === 'pemasukan')>Pemasukan</option>
                <option value="pengeluaran" @selected(request('jenis') === 'pengeluaran')>Pengeluaran</option>
            </select>
            <select name="metode" class="border rounded p-2">
                <option value="">Semua Metode</option>
                <option value="tunai" @selected(request('metode') === 'tunai')>Tunai</option>
                <option value="transfer" @selected(request('metode') === 'transfer')>Transfer</option>
            </select>
            <input type="date" name="dari" value="{{ request('dari') }}" class="border rounded p-2" />
            <input type="date" name="sampai" value="{{ request('sampai') }}" class="border rounded p-2" />
            <button class="px-4 py-2 bg-gray-800 text-white rounded">Filter</button>
        </form>

        <!-- Tabel -->
        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-gray-600 border-b">
                        <th class="py-2 px-4">Tanggal</th>
                        <th class="px-4">Jenis</th>
                        <th class="px-4">Metode</th>
                        <th class="px-4">Jumlah</th>
                        <th class="px-4">Keterangan</th>
                        <th class="px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $t)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4">
                                {{ \Carbon\Carbon::parse($t->tanggal_transaksi)->translatedFormat('d F Y') }}
                            </td>
                            <td
                                class="px-4 capitalize 
                                {{ $t->jenis === 'pemasukan' ? 'text-green-600 font-semibold' : 'text-red-600 font-semibold' }}">
                                {{ $t->jenis }}
                            </td>
                            <td class="px-4 capitalize">{{ $t->metode }}</td>
                            <td class="px-4">Rp {{ number_format($t->jumlah, 0, ',', '.') }}</td>
                            <td class="px-4">{{ $t->keterangan ?? '-' }}</td>
                            <td class="px-4">
                                <div class="flex space-x-2">
                                    <a href="{{ route('transaksi.edit', $t) }}"
                                        class="px-3 py-1 text-sm bg-blue-100 text-blue-700 rounded hover:bg-blue-200">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('transaksi.destroy', $t) }}"
                                        onsubmit="return confirm('Hapus transaksi ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-sm bg-red-100 text-red-700 rounded hover:bg-red-200">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-4 text-center text-gray-500">Tidak ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $data->links() }}
        </div>
    </div>
</x-app-layout>
