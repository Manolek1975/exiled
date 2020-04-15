<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNpcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('npcs', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255)->unique();
            $table->text('descripcion');
            $table->string('faction', 255)->nullable();
            $table->string('imagen', 255);
            $table->integer('areas_id');
            $table->integer('quests_id')->nullable();
            $table->text('notas')->nullable();
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
        Schema::dropIfExists('npcs');
    }
}
