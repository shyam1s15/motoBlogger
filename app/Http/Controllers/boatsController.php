<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\students;
use App\boats;
class boatsController extends Controller
{
    //
    public function create(){
        return view('layouts.boatups.make_boat');
    }

    public function getCreated(){
        $searchMail = app('App\Http\Controllers\UserSessionController')->getLoggedUser();
        $captain_id = \DB::table('students')->where('email','=',$searchMail)->first()->s_id;
        // echo $captain_id;
        // dd($captain_id);
        $doesClanExists = \DB::table('boats')->where([
            ['boat_name',$_POST['boat-name']],
            ['captain_id',$captain_id],
        ])->first();
        
        if($doesClanExists){
            return back()->with(['boatExists'=>"Hey Buddy You already created this boat"]);
        }

        \DB::table('boats')->insert(
            [
                'captain_id'=> $captain_id,
                'boat_name'=>$_POST['boat-name'],
                'boat_description'=>$_POST['boat-desc'],
            ]
        );


        $boat_id = \DB::table('boats')->where(
            [ ['boat_name','=',$_POST['boat-name'] ],
                ['captain_id','=',$captain_id],
            ]
            )->first()->boat_id;
        
        \DB::table('stu_boats')->insert([
            'stu_id'=>$captain_id,
            'b_id'=>$boat_id
        ]);
        // $boat_id = \DB::table('boats')->where('boat_name','=',$_POST['boat-name'])->first();
            // echo $_POST['boat-name'];
        // echo $boat_id;
        foreach(explode(" ",$_POST['boat-type']) as $type){
            \DB::table('boat_info')->insert(
                ['type'=>$type,
                'boat_info_id'=>$boat_id
                ]
            );
        }
        return $this->showBoat($boat_id);
    }

    public function showBoat($boat_id){
        $result = \DB::table('boats')->where("boat_id",'=',$boat_id)->first();
        // print_r ($result);
        // echo $result->boat_description;
        // echo "<br>";
        $result2 = \DB::table('boat_info')->where("boat_info_id",'=',$boat_id)->get();
        
        // foreach ($result2 as $r) {print_r ($r); echo "<br>";}
        $temp = array();
        // echo "<br>";
        foreach ($result2 as $r) 
        {   
            $temp[] = $r->type;
        }

        
        $pass_result = [
            'boat_name'=>$result->boat_name,
            'boat_desc'=>$result->boat_description,
            'boat_type'=>$temp
        ];
        // return "hii";
        return view('layouts.boatups.exe_boat',$pass_result);
        // return "hii";
        // echo $result->boat_name;
    }

    public function getShowBoatsOfUserPage(){
        $searchMail = app('App\Http\Controllers\UserSessionController')->getLoggedUser();

        $id = \DB::table('students')->where('email',$searchMail)->value('s_id');
        // dd($id);
        // $s = boats::find(4)->students;
        $ans = students::find($id)->boats;
        // dd($s);
        // foreach($ans as $a){
        //     // print_r ($a);
        //     echo "<br>";
        //     echo $a;
        // }
        // $boats = DB::table('')
        return \view('boat.showBoat')->with(['boats'=>$ans]);
    }

    public function showDetailedBoat($bName,$bId){
        $searchMail = app('App\Http\Controllers\UserSessionController')->getLoggedUser();
        $s_id = \DB::table('students')->where('email',$searchMail)->value('s_id');
        
        // $boat_info = \DB::table('boats')->where('boat_id',$bId)->first();
        // $students = App\students::find($bId)
        $boat_info = boats::find($bId);
        $post = $boat_info->posts;
        // dd($post);
        // $mcqs = $post->mcqs();
        $students = boats::find($bId)->students;
        
        return view('boat.boat_desc')->with(
             array("boat"=>$boat_info,
                "students"=>$students,
                "posts"=>$post,
                "logged_stu_id"=>$s_id
                )
            );
    }
}
