<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('posts_id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('s_id')
            ->on('students')->onDelete('cascade');

            $table->bigInteger('b_id')->unsigned()->nullable();
            $table->foreign('b_id')->references('boat_id')
            ->on('boats')->onDelete('cascade');

            $table->char('type',15)->nullable();
            $table->string('description',300)->nullable();
            
            $table->timestamps();
            // $table-> 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
