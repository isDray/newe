<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wine', function (Blueprint $table) {
            $table->increments('id');        // 流水編號
            $table->char('name', 100);       // 名稱
            $table->char('type', 10);        // 酒分類
            $table->char('variety', 10);     // 葡萄分類
            $table->char('origin', 10);      // 產地分類
            $table->char('taste', 10);       // 口感分類
            $table->char('winery', 10);      // 酒莊分類
            $table->text('des');             // 商品簡介
            $table->text('detail');          // 商品詳細
            $table->char('pic', 100);        // 酒的圖片
            $table->boolean('status');       // 是否啟用
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
        Schema::dropIfExists('wine');
    }
}
