<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserSessionController extends Controller
{
    //this controller may be used for users login activity
    // well our base idea is to provide the whole system login details
    // below functions are specific for all the files


    public function createSession($sessName,$sessValue){

    }

    public function storeLoggedUser($value){
        \session(["logged_user"=>$value]);
    }

    public function getLoggedUser(){
        return \session("logged_user");
    }
}
