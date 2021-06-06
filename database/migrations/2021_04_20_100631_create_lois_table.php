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
            $table->string('name')->nullable();
            $table->longText('contenu')->nullable();
            $table->integer('NbAraticle')->nullable();
            $table->date('DtDepot')->nullable();
            $table->date('DtPresCom')->nullable();
            $table->date('DtDiscusGen')->nullable();
            $table->date('DtVote')->nullable();
            $table->date('DtAdoptAPN')->nullable();
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
