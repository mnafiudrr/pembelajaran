<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
            $table->text('soal');
            $table->text('jawaban1');
            $table->text('jawaban2');
            $table->text('jawaban3');
            $table->text('jawaban4');
            $table->text('jawaban5');
            $table->string('jawaban');
            $table->foreignId('quizzes_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('soal');
    }
}
