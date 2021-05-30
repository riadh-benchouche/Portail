<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnonceARSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enonce_a_r_s', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('lois_id')->unsigned()->nullable();
            $table->foreign('lois_id')->references('id')->on('lois');
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
        Schema::dropIfExists('enonce_a_r_s');
        Schema::table('enonce_a_r_s', function (Blueprint $table) {
            $table->dropForeign('[lois_id]');
            $table->dropColumn('lois_id');
        });
    }
}
