<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    //
    public function payment2(){
        return view('payment2');
    }

    function receipt(Request $req){
        $receipt= new Receipt;
        $receipt->name=$req->name;
        $receipt->email=$req->email;
        $receipt->amount=$req->amount;
        $receipt->save();

        return redirect('/donatesuccess');

        

    }


}
