<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->bigIncrements('ann_id');
            // $table->char('ann_done_by',15);
            // $table->char('boat_name',20);
            $table->string('ann_msg',500);
            $table->char('ann_type',20);
            $table->timestamps();

            $table->integer('captain_id');//joins here
            $table->integer('boat_id');//joins here
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements');
    }
}
