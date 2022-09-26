<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontenssm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontenssm', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('photo1')->nullable();
            $table->string('photo2')->nullable();
            $table->string('photo3')->nullable();
            $table->text('paragraf1');
            $table->text('paragraf2')->nullable();
            $table->text('paragraf3')->nullable();
            $table->text('paragraf4')->nullable();
            $table->string('juduldoc1')->nullable();
            $table->string('doc1')->nullable();
            $table->string('juduldoc2')->nullable();
            $table->string('doc2')->nullable();
            $table->string('juduldoc3')->nullable();
            $table->string('doc3')->nullable();
            $table->foreignId('subsubmateris_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();;
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
        Schema::dropIfExists('kontenssm');
    }
}
