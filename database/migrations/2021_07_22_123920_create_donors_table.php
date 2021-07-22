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
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ktp');
            $table->string('nama_panggilan');
            $table->char('jenis_kelamin', 1);
            $table->date('tanggal_lahir');
            $table->string('no_ktp');
            $table->decimal('whatsapp', 16, 0);
            $table->char('gol_darah', 2);
            $table->char('rhesus', 1);
            $table->boolean('melahirkan_gugur');
            $table->date('tanggal_melahirkan_gugur')->nullable();
            $table->boolean('diabetes')->nullable();
            $table->boolean('hepatitis')->nullable();
            $table->boolean('aids')->nullable();
            $table->boolean('perokok')->nullable();
            $table->boolean('covid')->nullable();
            $table->date('tanggal_sembuh_covid')->nullable();
            $table->boolean('vaksin')->nullable();
            $table->char('jenis_vaksin', 1)->nullable();
            $table->date('tanggal_vaksin')->nullable();
            $table->char('status', 1); //pendonor atau reseptor
            $table->text('preferensi_lokasi');
            $table->string('instansi')->nullable();
            $table->string('peruntukan')->nullable();
            $table->foreignId('provinsi_code')->nullable()->constrained('provinsi');
            $table->foreignId('kabupaten_code')->nullable()->constrained('kabupaten');
            $table->foreignId('kecamatan_code')->nullable()->constrained('kecamatan');
            $table->foreignId('kelurahan_code')->nullable()->constrained('kelurahan');
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
        Schema::dropIfExists('donors');
    }
}
