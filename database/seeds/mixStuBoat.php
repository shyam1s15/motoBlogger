<?php

use Illuminate\Database\Seeder;

class mixStuBoat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('stu_boats')->insert([
            // 's_id' is kept empty as it is in auto increment state
            'stu_id'=>1,
            'b_id'=>1
        ]);
        \DB::table('stu_boats')->insert([
            // 's_id' is kept empty as it is in auto increment state
            'stu_id'=>1,
            'b_id'=>2
        ]);
        \DB::table('stu_boats')->insert([
            // 's_id' is kept empty as it is in auto increment state
            'stu_id'=>1,
            'b_id'=>3
        ]);
        
        \DB::table('stu_boats')->insert([
            // 's_id' is kept empty as it is in auto increment state
            'stu_id'=>2,
            'b_id'=>4
        ]);

        \DB::table('stu_boats')->insert([
            // 's_id' is kept empty as it is in auto increment state
            'stu_id'=>2,
            'b_id'=>5
        ]);
        \DB::table('stu_boats')->insert([
            // 's_id' is kept empty as it is in auto increment state
            'stu_id'=>2,
            'b_id'=>6
        ]);
    }
}
