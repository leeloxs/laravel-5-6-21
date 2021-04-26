<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use Illuminate\Http\Request;

class Payments1Controller extends Controller
{
    //
    function payment1store(Request $req)
    {
        $payment= new Payment;
        $payment ->name=$req->name;
        $payment ->email=$req->email;
        $payment ->phone=$req->phone;
        $payment ->charity=$req->charity;
        $payment ->amount=$req->amount;
        $payment ->cardnumber=$req->cardnumber;
        $payment ->expirymonth=$req->expirymonth;
        $payment ->expiryyear=$req->expiryyear;
        $payment ->CVV=$req->CVV;
        $payment ->city=$req->city;
        $payment ->save();

        return redirect('/donatesuccess');

    }
}
