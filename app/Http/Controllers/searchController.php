<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class searchController extends Controller
{
    //
    public function search(){
        $search_value = $_GET['seach-bar'];
        $ans = \DB::table('boats')->where('boat_name','like',$search_value)->get();
        // print_r($ans);

        $packet = array();
        foreach ($ans as $a){
            $sub_product = array();
            foreach ($a as $n=>$b){
                // echo $n." : ".$b."<br>";
                $sub_product[$n]= $b; 
            }
            $packet[] = $sub_product;
            // print_r ($a);
            // echo "<br>";
        }
        return view("layouts.boatups.search_boat_exe",["packet"=>$packet]);
    }
}
