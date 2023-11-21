<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adrese', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_korisnika');
            $table->string('ulica');
            $table->string('broj');
            $table->string('grad');
            $table->string('postanski_broj');
            $table->timestamps();

            $table->foreign('id_korisnika')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adrese');
    }
};
