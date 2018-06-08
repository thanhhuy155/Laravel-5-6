<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function showRegisterForm(){
        return view('fontend.register');
    }
    public function storeUser(Request $request){
        //dd($request->all());
        $message = [
            'required' => 'Truong :attribute bat buoc',
            'email'    => 'Truong :attribute phai co dinh dang email.'
        ];
        $validator = Validator::make($request->all(),[
            'name'  => 'required|max:225',
            'email' => 'required|email',
            'password' => 'required|numeric|min:6|confirmed',
            'website' => 'sometimes|required'
        ] ,$message);
        if($validator->fails()){
            return redirect('register')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            //Luu thong tin vao DB
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');
            $website = $request->input('website');
            DB::insert('insert into users (name, email, password, website) values (?, ?, ?, ?)', [$name, $email, $password, $website]);
            return redirect('register')
                    ->with('message', 'Đăng ký thành công.');

        }
    }
}
