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
        Schema::create('proizvod', function (Blueprint $table) {
            $table->id();
            $table->string('naziv');
            $table->decimal('cena', 8, 2);
            $table->enum('pakovanje', ['1', '5', '25']);
            $table->text('opis');
            $table->string('slika')->default('default.jpg');
            $table->string('raspolozivo')->default(true);
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
        Schema::dropIfExists('proizvod');
    }
};