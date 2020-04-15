<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->integer('categoria_id');
            $table->string('tipo');
            $table->string('nombre', 255)->unique();
            $table->text('imagen');
            //Propiedades
            $table->string('clase')->nullable();
            $table->string('rareza')->nullable();;
            $table->string('valor')->nullable();
            $table->string('efecto')->nullable();
            $table->integer('quest_id')->nullable();
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
        Schema::dropIfExists('items');
    }
}
