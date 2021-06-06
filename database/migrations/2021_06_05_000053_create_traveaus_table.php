<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraveausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traveaus', function (Blueprint $table) {
            $table->id();
            $table->integer('commission_id')->unsigned()->nullable();
            $table->foreign('commission_id')->references('id')->on('comission');
            $table->string('name');
            $table->longText('contenu');
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
        Schema::dropIfExists('traveaus');
        Schema::table('traveaus', function (Blueprint $table) {
            $table->dropForeign('[commission_id]');
            $table->dropColumn('commission_id');
        });
    }
}
