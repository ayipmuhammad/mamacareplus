<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToJadwalCheckupTable extends Migration
{
    public function up()
    {
        Schema::table('jadwal_checkup', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id'); // Tambahkan kolom user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Relasi ke tabel users
        });
    }

    public function down()
    {
        Schema::table('jadwal_checkup', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Hapus foreign key
            $table->dropColumn('user_id'); // Hapus kolom user_id
        });
    }
}
