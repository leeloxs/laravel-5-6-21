<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Onepay;
use Mail;

class OnepayController extends Controller
{
    public function payment1()
    {
        return view('payment1');
    }

    public function storepayment1(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'amount' => 'required|digits:10|numeric',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
        ]);

        $input = $request->all();

        Onepay::create($input);

        //  Send mail to admin
        \Mail::send('OnepayMail', array(
            'name' => $input['name'],
            'email' => $input['email'],
            'amount' => $input['amount'],
            'address' => $input['address'],
            'city' => $input['city'],
            'state' => $input['state'],
            'zip' => $input['zip'],
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('admin@admin.com', 'Admin')->subject($request->get('subject'));
        });

        return redirect()->back()->with(['success' => 'Contact Form Submit Successfully']);
    }
}