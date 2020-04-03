<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quests', function (Blueprint $table) {
            $table->id();
            $table->integer('categoria_id');
            $table->string('nombre', 255)->unique();
            $table->text('descripcion');
            $table->text('imagen');
            $table->text('inicio');
            $table->text('progreso');
            $table->text('guia');
            //Recompensas
            $table->string('objeto')->nullable();
            $table->string('xp')->nullable();
            $table->string('money')->nullable();
            $table->string('texto')->nullable();
            $table->string('title', 255)->unique();
            $table->string('slug', 255)->unique();            
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
        Schema::dropIfExists('quests');
    }
}
