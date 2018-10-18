<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVarietyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variety', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name', 60);        // 葡萄名稱
            $table->boolean('status');       // 狀態
            $table->longText('description'); // 葡萄描述
            $table->integer('sort');         // 由南至北排序
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
        Schema::dropIfExists('variety');
    }
}
