<?php

namespace App\Http\Controllers\boat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\boats;
use App\students;
use App\McqModel;

class collabrationEditAndViewController extends Controller
{
    //
    public function showUserPosts(){
        
        return view('boat.progress');
    }
    public function showUserPostsResponse(Request $request){
        $options = array('option1','option2','option3','option4');

        $stu_id = $request->uId;
        $boat_id = $request->bId;
        
        $boat = boats::find($boat_id);
        $posts = $boat->posts;
        $students = $boat->students;

        $refined_output = array();
        foreach($posts as $post){
            $mid_jugad = array();

            // $answers = McqModel::where([
            //     // ['mcq_id',$post->mcqs[0]->mcq_id]
            //     ['mcq_id',$post->mcqs[0]->mcq_id]
            // ])->first();
            
            // echo $post->mcqs[0]->mcq_id;
            // echo $answers->mcqQuestion;
            // echo $answers->option2;
            // dd($post->mcqs[0]->responsedAnswerOfMcq); 
            
            foreach( $post->mcqs[0]->responsedAnswerOfMcq as $index=>$respond){ 
                $mid_jugad[] = students::find($respond->id_of_stu)->email;
                $option = $options[ $respond->ans - 1 ];

                // echo $respond->id_of_mcq;

                $answers = McqModel::where([
                    // ['mcq_id',$post->mcqs[0]->mcq_id]
                    ['mcq_id',$respond->id_of_mcq]
                ])->first();
                
                $answers = McqModel::find($respond->id_of_mcq);
                // echo 'id : ' . $answers->mcq_id . " : ";
                // echo  ' p_id ' . $answers->p_id . " : ";
                // echo $answers->mcqQuestion;
                // $ans2 = \DB::statement("select '$option' from mcqContent where mcq_id = '$respond->id_of_mcq'");
                $ans2 = \DB::select("select " . $option . " from mcqContent where mcq_id = ?", [$respond->id_of_mcq]);
                $temp = array();
                foreach($ans2 as $ans){
                    $temp[] = (array)$ans;
                }
                // foreach ($temp as $t){
                //     // print_r($t);
                //     echo "<br>";
                //     echo $t[$option] . "<br>";
                // }
                // echo $temp[0][$option];
                // echo $ans2[0];
                // dd($answers);
                // echo $answers->mcqQuestion . "<br>";
                // echo count($post->mcqs[0]->responsedAnswerOfMcq);
                // echo $post->mcqs[0]->mcq_id;
                // echo($option);
                // echo $answers->value($option);

            // reset($answers);
                $mid_jugad[] = $temp[0][$option];
                $mid_jugad[] = $answers->value('correctAns') == $respond->ans ? "loved":"beloved";
                // dd($mid_jugad);
            }
            
            $refined_output[$post->mcqs[0]->mcqQuestion] = $mid_jugad;
            // dd($jugad);
        }
        // dd($refined_output);

        return view('boat.showProgress')->with([
            "result"=>$refined_output
        ]);
    }
}
