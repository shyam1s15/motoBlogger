<?php

use Illuminate\Database\Seeder;

use App\McqModel;
use App\posts;
class mcqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $mcq = new McqModel;
        $mcq->mcqQuestion = "where do i feel familiar";
        $mcq->option1 = "with Mom";
        $mcq->option2 = "with Technologies";
        $mcq->option3 = "with parth";
        $mcq->option4 = "with no one";

        $mcq->correctAns = "1";
        posts::find(2)->mcqs()->save($mcq);
    }
}
