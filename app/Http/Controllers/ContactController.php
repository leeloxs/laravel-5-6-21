<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    //
    public function contactus(){
        return view('contactus');
    }

    public function contactusstore(Request $req)
    {
        $contact= new Contact;
        $contact->fullname=$req->fullname;
        $contact->email=$req->email;
        $contact->phone=$req->phone;
        $contact->subject=$req->subject;
        $contact->message=$req->message;
        $contact->save();

        return redirect('/home');
    }    
}
