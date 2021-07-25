<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->decimal('no_telp', 16, 0)->nullable();
            $table->string('password');
            $table->boolean('enable')->default(true);
            $table->unsignedBigInteger('userable_id')->nullable();
            $table->foreignId('role_id')->nullable()->constrained('roles');
            $table->timestamp('last_login')->nullable();
            $table->string('social_id')->nullable();
            $table->string('social_type')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
