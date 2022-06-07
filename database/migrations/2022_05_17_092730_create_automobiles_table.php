<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutomobilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automobiles', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('performance');
            $table->string('energie');
            $table->string('qtestock');
            $table->string('prix');
$table->string('imageartpetitf');
$table->string('imageartgrandf');
$table->unsignedBigInteger('categorieID');
$table->foreign('categorieID')
->references('id')
->on('categories')
->onDelete('restrict')
->onUpdate('restrict');
$table->unsignedBigInteger('marqueID'); 
$table->foreign('marqueID')
->references('id')
->on('marques')
->onDelete('restrict')
->onUpdate('restrict');
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
        Schema::dropIfExists('automobiles');
    }
}
