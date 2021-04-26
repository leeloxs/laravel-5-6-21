<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Firstp;

class FirstpController extends Controller
    {
    // Create payment Form
    public function createForm(Request $request) {
        return view('firstp');
      }
    
    // Store Form data
    public function firstpUs(Request $request) {

        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'charity' => 'required',
            'amount' => 'required',
            'city' => 'city'
         ]);

        //  Store data in database
        firstp::create($request->all());

        // 
        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }

