<?php

use Illuminate\Database\Seeder;

class studentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('students')->insert([
            // 's_id' is kept empty as it is in auto increment state
            'email'=>'shyam1ss15@gmail.com',
            'password'=>'123',
            'address'=>'joshipura',
            'address2'=>'ambavadi-2',
            'city'=>'junagadh',
            'state'=>'gujarat',
            'zipcode'=>'362001',
        ]);
        \DB::table('students')->insert([
            // 's_id' is kept empty as it is in auto increment state
            'email'=>'kachhadiyashyam@gmail.com',
            'password'=>'123',
            'address'=>'joshipura',
            'address2'=>'ambavadi-2',
            'city'=>'junagadh',
            'state'=>'gujarat',
            'zipcode'=>'362001',
        ]);
    }
}
