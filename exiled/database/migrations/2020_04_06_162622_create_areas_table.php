<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->integer('categoria_id');
            $table->string('nombre', 255)->unique();
            $table->text('descripcion');
            $table->string('imagen', 255);
            $table->text('leyenda');
            $table->integer('npc_id');
            $table->integer('quest_id');
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
        Schema::dropIfExists('areas');
    }
}
