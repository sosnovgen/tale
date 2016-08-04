<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCollumsOrders extends Migration
{

    public function up()
    {
        Schema::table('orders', function($table)
        {
            $table->boolean('completed');
        });       
    }


    public function down()
    {
        //
    }
}
