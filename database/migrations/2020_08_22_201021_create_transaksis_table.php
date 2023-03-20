<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_mahasiswa');
            $table->integer('id_ruangan');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->text('deskipsi_pengembalian');
            $table->text('scan_ktm');
            $table->text('scan_surat_perijinan');
            $table->enum('status', ['pending','acc','tolak','selesai']);
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
