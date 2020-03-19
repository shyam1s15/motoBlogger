<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcqAnswerControllersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcq_answers', function (Blueprint $table) {
            $table->bigIncrements('mcq_ans_id');
            
            $table->bigInteger('id_of_mcq')->unsigned()->nullable();
            $table->foreign('id_of_mcq')->references('mcq_id')
            ->on('mcqContent')->onDelete('cascade');
            
            
            $table->bigInteger('id_of_stu')->unsigned()->nullable();
            $table->foreign('id_of_stu')->references('s_id')
            ->on('students')->onDelete('cascade');
            
            $table->char('ans', 4)->default('text');
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
        Schema::dropIfExists('mcq_answer_controllers');
    }
}
