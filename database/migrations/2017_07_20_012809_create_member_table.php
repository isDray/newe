<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->increments('id');      // 流水編號
            $table->string('name', 20);    // 名字
            $table->string('tel', 10);     // 家電
            $table->string('phone', 10);   // 手機
            $table->string('email');       // 信箱

            $table->timestamps();          // 建立時間,更新時間
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member');
    }
}
