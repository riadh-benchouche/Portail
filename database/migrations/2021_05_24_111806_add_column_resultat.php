<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnResultat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lois', function (Blueprint $table) {
            $table->integer('oui')->nullable();
            $table->integer('non')->nullable();
            $table->integer('abs')->nullable();
            $table->boolean('resultat')->nullable();
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
            $table->dropColumn('oui');
            $table->dropColumn('non');
            $table->dropColumn('abs');
            $table->dropColumn('resultat');
        });
    }
}
