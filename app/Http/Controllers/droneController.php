<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class droneController extends Controller
{
    //
    public function price(){

        $prices = array();
        $fc = 'pelu : naze32 1700(refunded) +  Biju(ghardhani) : 2700 + navu(1200) = ';
        $prices['fc'] = (1200+2700);
        $prices['fans'] = 500;
        $prices['esc']=2350;
        $prices['motors']=1400;
        $prices['frame']=800;
        $prices['remote-control']=2800;
        $prices['battery']=1200;
        $prices['charger']=500;
        $prices['gears']=300;
        $prices['parchuran']=500;
        $total = 0;
        foreach($prices as $p=>$s){
            $total+=$s;

            echo $p . " : " . $s ."<br>";
        }
        // return view('drones.price_history',prices);//"TOTAL = " . $total."<br>";
        // echo $fc . $prices['fc']; 
    }
}
