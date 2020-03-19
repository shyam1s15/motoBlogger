<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaptainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('captains', function (Blueprint $table) {
            $table->bigIncrements('cap_id');
            $table->char('name',15);
            $table->char('boat_name',15);
            $table->integer('annoucements')->default(0);
            $table->string('self_description',200)->default('Hellow I am cAptaIn here');
            $table->integer('super_posts')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('captains');
    }
}
