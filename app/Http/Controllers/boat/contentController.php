<?php

namespace App\Http\Controllers\boat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\boats;
use App\students;
use App\posts;
use App\McqModel;
use App\mcqAnswerModel;
use App\CommentModel;

class contentController extends Controller
{
    //
    public function storeMcq(Request $request){
        
        $ans = (int)$_GET['originalAns'];
        // $options = explode(",", $_GET['mcqInputs']);
        $options =  $_GET['mcqInputs'];
        $stu_id = $_GET['stuId'];
        $boat_id = $_GET['boatId'];
        
        $mcq = new McqModel;
        $mcq->mcqQuestion = $_GET['mcqQuestion'];
        $mcq->option1 = $options[0];
        $mcq->option2 = $options[1];
        $mcq->option3 = $options[2];
        $mcq->option4 = $options[3];
        $mcq->correctAns = $options[$ans];
        // $mcq-save();

        // get user id
        // $user_id = app('App\Http\Controllers\UserSessionController')->getLoggedUser();
        // $user_id = \DB::table('students')->where('email',$user_id)->value('s_id');

        $post = new posts;
        $post->type = "mcq";
        $post->description = "none";
        $post->user_id = $stu_id;
        $post->b_id = $boat_id; 
        $post->save();
        $post->mcqs()->save($mcq);
        // $post->save();

        // $stu = students::find($_GET['stuId']);

        return response()->json([ 'res'=> $options[(int)$ans] ]);
        // return response()->json([ 'res'=> $_GET['mcqInputs'] ]);
    }



    public function createContent(Request $request,$bName,$bId){
        //check if the user of the same clan
        $user = app('App\Http\Controllers\UserSessionController')->getLoggedUser();
        $id = \DB::table('students')->where('email',$user)->value('s_id');
        $boat_users = boats::find($bId)->students;
    
        if( $boat_users->where('s_id', $id)->first() === null){
            return \redirect(\url('/login_users'));
        }
        return view("boat.collab.index")->with(['stu_id'=>$id,'bId'=>$bId]);
    }

    public function storeResponseOfMcq(){
        $stu_id = $_GET['stuId'];
        $mcq_id = $_GET['mcqId'];
        $stu_id = $_GET['stuId'];
        $mcqAns = $_GET['mcqAns'];

        $hasResponse = mcqAnswerModel::where([
            ['id_of_mcq',$mcq_id],
            ['id_of_stu',$stu_id]
        ])->first();

        if($hasResponse){
            $hasResponse->ans = $mcqAns;
            $hasResponse->save();
            return \response()->json(['isMember'=>"true"]);
        }
        // else part
        
        $mcqResponse = new mcqAnswerModel;
        $mcqResponse->ans = $mcqAns;
        $mcqResponse->id_of_stu = $stu_id;

        // $mcqResponse
        $mcq = McqModel::find($mcq_id);
        $mcq->responsedAnswerOfMcq()->save($mcqResponse);

        return \response()->json(['isMember'=>"true"]);
    }
}
