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
        if (!Schema::hasTable('m_barang')) {
            Schema::create('m_barang', function (Blueprint $table) {
                $table->id('barang_id');
                $table->unsignedBigInteger('kategori_id')->index(); // indexing untuk Foreignkey
                $table->string('barang_kode', 10)->unique()->nullable(false); // unique untuk memastikan tidak ada username yang sama
                $table->string('barang_nama', 100);
                $table->integer('harga_beli');
                $table->integer('harga_jual');
                $table->timestamps();
    
             // Mendefinisikan Foreign Key pada kolom level_id mengacu pada kolom level_id di tabel m_level
             $table->foreign('kategori_id')->references('kategori_id')->on('m_kategori');
    
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_barang');
    }
};
