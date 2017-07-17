<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    /*-----------------------
    | 2017-07-10 | Ray       
    |------------------------
    | 1) 流水編號
    | 2) ip位置
    | 3) 紀錄
    | 4) 創建日期
    | 5) 修改日期
    |------------------------
    */
    public function up()
    {
        //如果資料庫中,沒有這張表時,才做產生表的動作
        
            
            Schema::create('act_log', function (Blueprint $table) {
                $table->increments('id');
                $table->ipAddress('ip');
                $table->string('log',250);
                $table->dateTime('created_at');
                $table->dateTime('updated_at');
            });
        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
