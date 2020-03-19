<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PreRegistered extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempStudents', function (Blueprint $table) {
            $table->bigIncrements('temp_id');
            $table->char('email',40);
            $table->char('password',200);
            $table->char('address',100)->default('joshipura');
            $table->char('address2',100)->default('ambavadi-2');
            $table->char('city',30)->default('washington');
            $table->char('state',50)->default('washingtoh-DC');
            $table->char('zipcode',10)->default('450002');
            $table->char('hashCode',100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tempStudents');
    }
}
