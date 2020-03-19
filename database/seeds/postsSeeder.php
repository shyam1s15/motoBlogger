<?php

use Illuminate\Database\Seeder;
use App\posts;
use App\students;
use App\boats;
class postsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $post = new posts;
        $post->type = "c++";
        $post->description = "fastest programming language";
        $stu = students::find(1);
        $stu->posts()->save($post);
        
        $boat = boats::find(1);
        $post = new posts;
        $post->type = "flutter";
        $post->description = "Best for designers!! I love it!";
        
        $boat->posts()->save($post);
        $stu->posts()->save($post);
        
    }
}
