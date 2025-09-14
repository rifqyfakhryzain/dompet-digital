<x-app-layout>
    {{-- Header --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">Dashboard</h2>
    </x-slot>

    {{-- Content --}}
    <div class="py-6">
        {{-- 3 Cards Ringkasan --}}
        <div class="max-w-7xl mx-auto grid gap-4 md:grid-cols-3">
            {{-- Saldo --}}
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <div class="text-gray-500">Saldo</div>
                <div class="text-3xl font-bold">
                    Rp {{ number_format($saldo, 0, ',', '.') }}
                </div>
            </div>

            {{-- Total Pemasukan --}}
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <div class="text-gray-500">Total Pemasukan</div>
                <div class="text-2xl font-semibold text-green-600">
                    Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
                </div>
            </div>

            {{-- Total Pengeluaran --}}
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <div class="text-gray-500">Total Pengeluaran</div>
                <div class="text-2xl font-semibold text-red-600">
                    Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
                </div>
            </div>
        </div>

        {{-- Tabel Transaksi Terbaru --}}
        <div class="max-w-7xl mx-auto mt-6 bg-white rounded-lg shadow">
            <div class="p-6 border-b text-lg font-semibold text-gray-700">
                Transaksi Terbaru
            </div>
            <div class="p-6 overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-gray-600 border-b">
                            <th class="py-2 px-3">Tanggal</th>
                            <th class="px-3">Jenis</th>
                            <th class="px-3">Metode</th>
                            <th class="px-3">Jumlah</th>
                            <th class="px-3">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($terbaru as $t)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-2 px-3">
                                    {{ \Carbon\Carbon::parse($t->tanggal_transaksi)->translatedFormat('d F Y') }}
                                </td>
                                <td
                                    class="px-4 capitalize 
                                    {{ $t->jenis === 'pemasukan' ? 'text-green-600 font-semibold' : 'text-red-600 font-semibold' }}">
                                    {{ $t->jenis }}
                                </td>
                                <td class="px-3 capitalize">{{ $t->metode }}</td>
                                <td class="px-3 font-medium">
                                    Rp {{ number_format($t->jumlah, 0, ',', '.') }}
                                </td>
                                <td class="px-3">{{ $t->keterangan ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-4 text-center text-gray-500">
                                    Belum ada transaksi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
