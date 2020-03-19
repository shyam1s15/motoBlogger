<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boats', function (Blueprint $table) {
            $table->bigIncrements('boat_id');
            $table->char('boat_name',30);
            $table->string('boat_description',400)->nullable()->default('DESC should be jakas');
            $table->integer('total_members')->default(1);
            $table->integer('total_devs')->default(1);
            $table->smallInteger('boat_level')->default(1);
            $table->integer('total_posts')->default(0);
            // $table->char('type',15);
            $table->integer('captain_id');//joins here
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boats');
    }
}
