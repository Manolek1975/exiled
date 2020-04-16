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
            $table->string('imagequest');
            $table->text('images');
            //Walkthrough
            $table->string('inicio');
            $table->integer('area_id');
            $table->integer('npc_id');
            $table->json('progreso');
            $table->text('descripcion');
            //Recompensas
            $table->integer('item_id')->nullable();
            $table->integer('xp')->nullable();
            $table->integer('oro')->nullable();
            $table->json('reputacion')->nullable();
            $table->string('notas')->nullable();
            $table->string('quest_id')->nullable();
            //SEO
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
