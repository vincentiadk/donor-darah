<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donor_id')->nullable()->constrained('donors');
            $table->char("kabupaten_code", 4)->nullable();
            $table->foreign("kabupaten_code")->references("code")->on("kabupaten");
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
        Schema::dropIfExists('location_preferens');
    }
}
