<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStuBoatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stu_boats', function (Blueprint $table) {
            $table->bigIncrements('mix_id');
            $table->integer('stu_id');
            $table->integer('b_id');
            // $table->foreign('stu_id')->references('s_id')
            // ->on('students');//->onDelete('cascade');

            
            // $table->foreign('b_id')->references('boat_id')
            // ->on('boats');//->onDelete('cascade');
            
            $table->timestamps();
            // $table->primary(['stu_id','boat_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stu_boats');
    }
}
