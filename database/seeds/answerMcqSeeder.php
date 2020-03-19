<?php

use Illuminate\Database\Seeder;
use App\posts;
use App\answerModel;
class answerMcqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $pos = posts::find(2);
        $ans = new answerModel;
        $ans->answer = "It's her choice!! You have no fu**ing right to slap her";
        $ans->stu_id = 1;
        $pos->answers()->save($ans);
        // $stu = students::find(1);

        // $stu->answers()-
    }
}
