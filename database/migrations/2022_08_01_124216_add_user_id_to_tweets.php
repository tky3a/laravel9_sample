<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tweets', function (Blueprint $table) {
            // user_idカラムを追加　afterで追加位置をidの次に指定
            $table->unsignedBigInteger('user_id')->after('id');

            // usersテーブルのidカラムにuser_idカラムを紐づける
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
        Schema::table('tweets', function (Blueprint $table) {
            $table->dropForeign('tweets_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
};
