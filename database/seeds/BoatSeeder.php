<?php

use Illuminate\Database\Seeder;

class BoatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('boats')->insert([
            // 's_id' is kept empty as it is in auto increment state
            'boat_name'=>'jakas',
            'boat_description'=>'hii bro',
            'captain_id'=>1,//shyam
        ]);

        \DB::table('boats')->insert([
            // 's_id' is kept empty as it is in auto increment state
            'boat_name'=>'jakas2',
            'boat_description'=>'hii bro',
            'captain_id'=>1,//shyam
        ]);
        \DB::table('boats')->insert([
            // 's_id' is kept empty as it is in auto increment state
            'boat_name'=>'jakas3',
            'boat_description'=>'hii bro',
            'captain_id'=>1,//shyam
        ]);


        \DB::table('boats')->insert([
            // 's_id' is kept empty as it is in auto increment state
            'boat_name'=>'bakri',
            'boat_description'=>'hii bro',
            'captain_id'=>2,//ks
        ]);

        \DB::table('boats')->insert([
            // 's_id' is kept empty as it is in auto increment state
            'boat_name'=>'bakri2',
            'boat_description'=>'hii bro',
            'captain_id'=>2,//ks
        ]);
        \DB::table('boats')->insert([
            // 's_id' is kept empty as it is in auto increment state
            'boat_name'=>'bakri3',
            'boat_description'=>'hii bro',
            'captain_id'=>2,//ks
        ]);
    }
}
