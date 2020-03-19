<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            tempUserSeeder::class,
            studentsSeeder::class,
            BoatSeeder::class,
            mixStuBoat::class,

            postsSeeder::class,
            mcqSeeder::class,
            answerMcqSeeder::class,
        ]);
    }
}
