<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    use HasFactory;
    protected $table = 'transaksi';

    protected $fillable = [
        'id_pengguna',
        'jenis', //Pemasukan dan pengeluaran
        'metode', //tunai/transfer
        'jumlah',
        'keterangan',
        'tanggal_transaksi'
    ];

    protected $casts = [
        'jumlah' => 'decimal:2',
    ];

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
        
    }
}
