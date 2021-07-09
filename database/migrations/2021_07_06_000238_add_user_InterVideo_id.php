<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserInterVideoId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inter_videos', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->after('id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inter_videos', function (Blueprint $table) {
            $table->dropForeign('[user_id');
            $table->dropColumn('user_id');
        });
    }
}
