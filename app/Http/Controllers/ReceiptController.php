<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $path = Storage::putFile('public/receipts', $req->file('upload'));
        $receipt->upload = $path;
        $receipt->save();

        return redirect('/donatesuccess');

        

    }


}
