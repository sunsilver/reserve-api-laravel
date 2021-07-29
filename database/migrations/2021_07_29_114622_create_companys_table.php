<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('follow_id');
            $table->foreign('follow_id')->references('id')->on('follows');
            $table->Boolean('check')->default(0)->comment('사업장 검증 유무');
            $table->string('name')->comment('승마장 이름');
            $table->string('adress')->comment('승마장 위치');
            $table->string('tel')->unique()->comment('승마장 전화번호');
            $table->Boolean('is_trail')->default(0)->comment('외승가능 유무');
            $table->Boolean('is_store')->default(0)->comment('말 보관 유무');
            $table->string('website')->unique()->comment('웹 사이트 주소');
            $table->string('imit')->commit('한 타임 최대 수용 인원');
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
        Schema::dropIfExists('companys');
    }
}
