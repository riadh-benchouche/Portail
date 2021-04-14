<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnMatriculeToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('matricule')->nullable()->unique();
            $table->string('nom_a')->nullable();
            $table->string('category')->nullable();
            $table->boolean('president')->default(false);
            $table->integer('service_id')->unsigned()->after('id')->nullable();
            $table->foreign('service_id')->references('id')->on('service');
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('[service_id]');
            $table->dropColumn('service_id');
            $table->dropForeign('[comission_id]');
            $table->dropColumn('comission_id');
        });
    }
}
