<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateStatusDefaultInJadwalCheckupTable extends Migration
{
    public function up()
    {
        Schema::table('jadwal_checkup', function (Blueprint $table) {
            $table->string('status')->default('pending')->change();
        });
    }

    public function down()
    {
        Schema::table('jadwal_checkup', function (Blueprint $table) {
            $table->string('status')->default(null)->change();
        });
    }
}
