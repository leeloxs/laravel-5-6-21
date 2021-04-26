<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\firstmember;

class PayController extends Controller
{
    //
    function addData(Request $req){
        
        $firstmember= new firstmember ;
        $firstmember->name= $req->name;
        $firstmember->email= $req->email;
        $firstmember->money= $req->money;
        $firstmember->adr= $req->adr;
        $firstmember->city= $req->city;
        $firstmember->state= $req->state;
        $firstmember->zip= $req->zip;
        $firstmember->save();

    }
}
