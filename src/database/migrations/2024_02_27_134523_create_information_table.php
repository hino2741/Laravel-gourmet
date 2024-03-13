<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('インフォメーションID');
            $table->unsignedBigInteger('user_id')->comment('ユーザID');
            $table->string('title')->comment('タイトル');
            $table->text('content')->comment('内容');
            $table->dateTime('release_date')->comment('公開日');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('admin_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information');
    }
}
