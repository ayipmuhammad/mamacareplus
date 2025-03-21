<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('jadwal_imunisasi', function (Blueprint $table) {
        $table->id();
        $table->string('nama_anak');
        $table->integer('usia');
        $table->date('tanggal');
        $table->string('lokasi');
        $table->string('jenis_imunisasi');
        $table->text('catatan')->nullable();
        $table->enum('status', ['menunggu', 'terkonfirmasi', 'selesai'])->default('menunggu');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_imunisasi');
    }
};
