<?php

namespace App\Http\Controllers\boat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\students;

class joinController extends Controller
{
    //
    public function joinOrLeave(Request $request){
        $search_mail = app('App\Http\Controllers\UserSessionController')->getLoggedUser();
        // return response()->json(['try1'=>$search_mail]);
        
        $stu_id = \DB::table('students')->where('email','=',$search_mail)->first()->s_id;
        // return response()->json(['try1'=>$stu_id]);
        // return response()->json(['try1'=>$request->boat_id]);
        $hasJoined = $this->isJoined($stu_id,$request->boat_id);
        if($hasJoined){
            $student = students::find($stu_id);
            $student->boats()->detach($request->boat_id);
            
            $this->updateRecordsOnJoinOrLeave($hasJoined,$request->boat_id);

            return response()->json(['isMember'=>"true"]);
        }else{
            $student = students::find($stu_id);
            $student->boats()->attach($request->boat_id);
            $this->updateRecordsOnJoinOrLeave($hasJoined,$request->boat_id);

            return response()->json(['isMember'=>"false"]);
        }
    }


    public function isJoined($stu_id,$boat_id){
        $member = \DB::table('stu_boats')->where([
            ['b_id',$boat_id],
            ['stu_id',$stu_id],
        ])->first();

        if($member) {
            return true;
        }else{
            return false;
        }
    }

    public function knowJoinOrLeave(Request $request){
        $search_mail = app('App\Http\Controllers\UserSessionController')->getLoggedUser();
        // return response()->json(['try1'=>$search_mail]);
        
        $stu_id = \DB::table('students')->where('email','=',$search_mail)->first()->s_id;
        // return response()->json(['try1'=>$stu_id]);
        // return response()->json(['try1'=>$request->boat_id]);
        $hasJoined = $this->isJoined($stu_id,$request->boat_id);
        if($hasJoined){
            return response()->json(['isMember'=>"true"]);
        }else{
            return response()->json(['isMember'=>"false"]);
        }
    }

    public function updateRecordsOnJoinOrLeave($hasJoined,$boat_id){
        if($hasJoined != "true"){
            $boat = \DB::table('boats')->where([
                'boat_id'=>$boat_id
            ])->increment('total_members');
            // $boat
        }else{
            \DB::table('boats')->where([
                'boat_id'=>$boat_id
            ])->decrement('total_members');
            // $boat
        }
        return ;
    } 
}
