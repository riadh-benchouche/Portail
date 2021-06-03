<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIdLois extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lois', function (Blueprint $table) {
            $table->integer('session_id')->unsigned()->after('id')->nullable();
            $table->foreign('session_id')->references('id')->on('session');
            $table->integer('ministere_id')->unsigned()->after('id')->nullable();
            $table->foreign('ministere_id')->references('id')->on('ministere');
            $table->integer('comission_id')->unsigned()->after('id')->nullable();
            $table->foreign('comission_id')->references('id')->on('comission');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lois', function (Blueprint $table) {
            $table->dropForeign('[session_id]');
            $table->dropColumn('session_id');
            $table->dropForeign('[ministere_id]');
            $table->dropColumn('ministere_id');
            $table->dropForeign('[comission_id]');
            $table->dropColumn('comission_id');
        });
    }
}
