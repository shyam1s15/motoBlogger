<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class McqContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
    */
    public function up()
    {
        Schema::create('mcqContent', function (Blueprint $table) {
            $table->bigIncrements('mcq_id');
            $table->bigInteger('p_id')->unsigned()->nullable();
            
            $table->string('mcqQuestion', 200)->nullable();
            
            $table->string('option1', 200)->nullable();
            $table->string('option2', 200)->nullable();
            $table->string('option3', 200)->nullable();
            $table->string('option4', 200)->nullable();
            
            $table->char('correctAns', 10)->nullable();

            
            $table->foreign('p_id')->references('posts_id')
            ->on('posts')->onDelete('cascade');
            
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
        Schema::dropIfExists('mcqContent');
    }
}
