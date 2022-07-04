<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatasalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_member')->nullable();
            $table->string('batch', 20);
            $table->unsignedInteger('poin')->default(0);
            $table->string('no_hp', 20);
            $table->string('tanggal', 12);
            $table->string('source', 100);
            $table->string('recipient', 100);
            $table->string('status_member', 1)->nullable();
            $table->string('status_cek_is_member', 1)->nullable();
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
        Schema::dropIfExists('datasales');
    }
}
