<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactClient;
use App\Models\Client;
use Mail;

class MyController extends Controller
{
    public function my_data(){
        return view('test');
    }

    public function receiveForm1(Request $request){
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        return view('form1_result', compact('fname', 'lname'));
    }

    public function myVal(){
        //session()->put('test', 'My First Session');
        session()->flash('test1', 'My First Session');
        return 'Session Created';
    }

    public function restoreVal(){
        return 'My Session Value is: ' . session('test1');
    }

    public function deleteVal(){
        //session()->forget('test');
        session()->flush();
        return 'Session Removed';
    }

    public function sendClientMail(){
        $data = Client::findOrFail(1)->toArray();
        $data['theMessage'] = 'My First Test Email';
        Mail::to($data['email'])->send(
            new ContactClient($data)
        );
        return "mail sent!";
    }
}
