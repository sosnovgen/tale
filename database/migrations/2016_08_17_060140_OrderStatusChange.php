<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderStatusChange extends Migration
{
 
       
        public function up()
    {
        Schema::table('orders', function($table)
        {
            $table->string('status');
        });
    }

 
    public function down()
    {
        //
    }
}
