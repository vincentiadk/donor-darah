<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donor_histories', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_donor');
            $table->string('instansi');
            $table->char('jenis_donor', 1)->nullable();
            $table->foreignId('donor_id')->constrained('donors');
            $table->foreignId('reseptor_id')->nullable()->constrained('donors');
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
