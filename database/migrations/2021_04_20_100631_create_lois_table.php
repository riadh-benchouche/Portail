<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lois', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('contenu');
            $table->integer('NbAraticle');
            $table->date('DtDepot');
            $table->date('DtPresCom');
            $table->date('DtDiscusGen');
            $table->date('DtVote');
            $table->date('DtAdoptAPN');
            $table->boolean('Adoption')->nullable();
            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('_lois');
    }
}
