<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showContactForm(Request $request){
         $name = $request->cookie('name');
         $email =$request->cookie('email');
        return view('contact')->with(['name'=>$name,'email'=>$email]);
    }
    public function insertMessage(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $title = $request->input('title');
        $message = $request-> input('message');
        //Luu cookie 30p
        $minutes = 30;
        $name_cookie = cookie('name',$name,$minutes);
        $email_cookie = cookie('email',$email,$minutes);

       $data =  ['success'=> 'You send message success: ','name' =>$name, 'title'=> $title,'message'=> $message];
        return response()
                ->view('contact',$data,200)
                ->withCookie($name_cookie)
                ->withCookie($email_cookie);

    }
}
