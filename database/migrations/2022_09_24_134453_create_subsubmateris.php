<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsubmateris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsubmateris', function (Blueprint $table) {
            $table->id();
            $table->string('icon');
            $table->string('header');
            $table->string('judul');
            $table->string('photo1');
            $table->text('paragraf1');
            $table->text('paragraf2')->nullable();
            $table->text('paragraf3')->nullable();
            $table->text('paragraf4')->nullable();
            $table->string('photo2');
            $table->text('paragraf5');
            $table->text('paragraf6')->nullable();
            $table->text('paragraf7')->nullable();
            $table->text('paragraf8')->nullable();
            $table->foreignId('submateris_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();;
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
        Schema::dropIfExists('subsubmateris');
    }
}
