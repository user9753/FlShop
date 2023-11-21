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
        Schema::create('poruceno', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_korisnika');
            $table->unsignedBigInteger('id_proizvoda');
            $table->integer('kolicina');
            $table->enum('pakovanje', ['1', '5', '25']);
            $table->boolean('odobreno')->nullable(); 
            $table->timestamps();

            $table->foreign('id_korisnika')->references('id')->on('users');
            $table->foreign('id_proizvoda')->references('id')->on('proizvod');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poruceno');
    }
};
