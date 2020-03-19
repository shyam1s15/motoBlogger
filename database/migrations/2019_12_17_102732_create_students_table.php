<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('s_id');
            $table->char('email',40);
            $table->char('password',200);
            $table->char('address',100)->default('joshipura');
            $table->char('address2',100)->default('ambavadi-2');
            $table->char('city',30)->default('washignton');
            $table->char('state',50)->default('washington-DC');
            $table->char('zipcode',10)->default('450002');
            $table->char('stu_name',20)->nullable();
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
        Schema::dropIfExists('students');
    }
}
