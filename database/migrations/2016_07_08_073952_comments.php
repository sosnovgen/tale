<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comments extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id'); //здесь будет хранится id статьи
            $table->text('content');
            $table->string('author');
            $table->string('email');
            $table->boolean('public')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('comments');
    }
}
