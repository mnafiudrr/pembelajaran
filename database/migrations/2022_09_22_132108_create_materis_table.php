<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materis', function (Blueprint $table) {
            $table->id();
            $table->string('icon');
            $table->string('header');
            $table->string('judul');
            $table->string('link');
            $table->string('photo');
            $table->text('paragraf1');
            $table->text('paragraf2')->nullable();
            $table->text('paragraf3')->nullable();
            $table->text('paragraf4')->nullable();
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
        Schema::dropIfExists('materis');
    }
}
