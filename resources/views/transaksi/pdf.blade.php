<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: sans-serif; color: #333; line-height: 1.5; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #10b981; padding-bottom: 10px; }
        .title { font-size: 24px; font-weight: bold; color: #10b981; }
        .summary { margin-bottom: 20px; width: 100%; }
        .summary td { padding: 10px; border: 1px solid #eee; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background-color: #f9fafb; color: #6b7280; font-size: 11px; text-transform: uppercase; padding: 10px; text-align: left; border-bottom: 1px solid #e5e7eb; }
        td { padding: 12px 10px; font-size: 12px; border-bottom: 1px solid #f3f4f6; }
        .pemasukan { color: #059669; font-weight: bold; }
        .pengeluaran { color: #dc2626; font-weight: bold; }
        .footer { margin-top: 30px; font-size: 10px; text-align: center; color: #9ca3af; }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">E-Wallet Kita</div>
        <div style="font-size: 12px; color: #666;">Laporan Transaksi: {{ auth()->user()->name }}</div>
    </div>

    <table class="summary">
        <tr>
            <td>
                <small>SALDO AKHIR</small><br>
                <strong>Rp {{ number_format($saldo, 0, ',', '.') }}</strong>
            </td>
            <td>
                <small>TOTAL MASUK</small><br>
                <span class="pemasukan">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</span>
            </td>
            <td>
                <small>TOTAL KELUAR</small><br>
                <span class="pengeluaran">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</span>
            </td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Metode</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $t)
            <tr>
                <td>{{ \Carbon\Carbon::parse($t->tanggal_transaksi)->format('d/m/Y') }}</td>
                <td>
                    {{ $t->keterangan ?? '-' }}<br>
                    <small style="color: #999; text-transform: uppercase;">{{ $t->jenis }}</small>
                </td>
                <td>{{ strtoupper($t->metode) }}</td>
                <td class="{{ $t->jenis == 'pemasukan' ? 'pemasukan' : 'pengeluaran' }}">
                    {{ $t->jenis == 'pemasukan' ? '+' : '-' }} Rp {{ number_format($t->jumlah, 0, ',', '.') }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ now()->format('d M Y H:i') }}
    </div>
</body>
</html>