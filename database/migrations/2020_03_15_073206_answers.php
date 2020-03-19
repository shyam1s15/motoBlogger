<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Answers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer', function (Blueprint $table) {
            $table->bigIncrements('ans_id');
            
            $table->bigInteger('stu_id')->unsigned()->nullable();
            $table->foreign('stu_id')->references('s_id')
            ->on('students')->onDelete('cascade');
            
            
            $table->bigInteger('p_id')->unsigned()->nullable();
            
            $table->foreign('p_id')->references('posts_id')
            ->on('posts')->onDelete('cascade');
            
            
            $table->string('answer', 400)->nullable();
            
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
        Schema::dropIfExists('answer');
    }
}
