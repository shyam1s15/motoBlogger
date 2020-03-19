<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BoatInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boat_info', function (Blueprint $table) {
            $table->unsignedBigInteger('boat_info_id');
            $table->char('type','20')->nullable();
            $table->char('members','40')->nullable();
            $table->foreign('boat_info_id')->references('boat_id')->on('boats')->onDelete('cascade');
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
        Schema::dropIfExists('boat_info');
    }
}
