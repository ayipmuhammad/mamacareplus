<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalCheckupTable extends Migration
{
    public function up()
    {
        Schema::create('jadwal_checkup', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('lokasi');
            $table->enum('status', ['menunggu', 'terkonfirmasi', 'selesai'])->default('menunggu');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Tambahkan kolom user_id
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_checkup');
    }
}
