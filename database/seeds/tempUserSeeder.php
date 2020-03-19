<?php

use Illuminate\Database\Seeder;

class tempUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('tempStudents')->insert([
            // temp_id is auto increment state
            'email'=>'shyam1ss15@gmail.com',
            'password'=>'123',
            'address'=>'joshipura',
            'address2'=>'ambavadi-2',
            'city'=>'junagadh',
            'state'=>'gujarat',
            'zipcode'=>'362001',
        ]);
    }
}
