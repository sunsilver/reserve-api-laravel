<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companys');
            $table->string('name')->comment('회원권/레슨 이름');
            $table->string('day')->comment('기간(일)');
            $table->string('price')->comment('가격');
            // $table-> ->comment('회원권 레슨 타입') 타입 ? 
            $table->Boolean('is_show')->default(0)->comment('공개 유무');
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
        Schema::dropIfExists('tickets');
    }
}
