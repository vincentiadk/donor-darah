<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("donors", function (Blueprint $table) {
            $table->id();
            $table->string("nama_ktp");
            $table->string("nama_panggilan")->nullable();
            $table->char("jenis_kelamin", 1)->nullable();
            $table->date("tanggal_lahir")->nullable();
            $table->string("no_ktp")->nullable();
            $table->decimal("whatsapp", 16, 0)->nullable();
            $table->char("gol_darah", 2)->nullable();
            $table->char("rhesus", 1)->nullable();
            $table->boolean("melahirkan_gugur")->nullable();
            $table->date("tanggal_melahirkan_gugur")->nullable();
            $table->boolean("diabetes")->nullable();
            $table->boolean("hepatitis")->nullable();
            $table->boolean("aids")->nullable();
            $table->boolean("perokok")->nullable();
            $table->boolean("covid")->nullable();
            $table->date("tanggal_sembuh_covid")->nullable();
            $table->boolean("vaksin")->nullable();
            $table->char("jenis_vaksin", 1)->nullable();
            $table->date("tanggal_vaksin")->nullable();
            $table->char("jenis_donor", 1)->nullable(); //biasa atau plasma kovalen
            $table->string("instansi")->nullable();
            $table->string("peruntukan")->nullable();
            $table->char("provinsi_code", 2)->nullable();
            $table->char("kabupaten_code", 4)->nullable();
            $table->char("kecamatan_code", 7)->nullable();
            $table->char("kelurahan_code", 10)->nullable();
            $table->boolean("is_donor_biasa")->nullable();
            $table->boolean("is_donor_plasma")->nullable();
            $table->timestamps();

            $table->foreign("provinsi_code")->references("code")->on("provinsi");
            $table->foreign("kabupaten_code")->references("code")->on("kabupaten");
            $table->foreign("kecamatan_code")->references("code")->on("kecamatan");
            $table->foreign("kelurahan_code")->references("code")->on("kelurahan");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("donors");
    }
}
