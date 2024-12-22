<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKhususColumnToTbpendafaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_pendaftaran', function (Blueprint $table) {
            $table->string('khusus')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_pendaftaran', function (Blueprint $table) {
            $table->dropColumn('khusus');
        });
    }
}
