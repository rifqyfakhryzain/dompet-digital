<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengguna')->constrained('users')->onDelete('cascade');
            $table->enum('jenis',['pemasukan','pengeluaran']);
            $table->enum('metode',['tunai','transfer']);
            $table->decimal('jumlah',15,2);
            $table->string('keterangan')->nullable();
            $table->date('tanggal_transaksi');
            $table->timestamps();

            $table->index(['id_pengguna','jenis']);
            $table->index(['id_pengguna','metode']);
            $table->index(['id_pengguna','tanggal_transaksi']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
