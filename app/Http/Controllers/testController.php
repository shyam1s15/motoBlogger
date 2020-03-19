<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    //
    public function getImage(){
        
    }
    public function testSessions(){
        \session(["name"=>"shyam"]);
        return \view("testings.sessioning");
    }
}
