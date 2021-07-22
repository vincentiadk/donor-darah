<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatDonorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_donor', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_donor');
            $table->string('instansi');
            $table->foreignId('donor_id')->constrained('donors');
            $table->foreignId('reseptor_id')->constrained('donors')->nullable();
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
        Schema::dropIfExists('riwayat_donor');
    }
}
