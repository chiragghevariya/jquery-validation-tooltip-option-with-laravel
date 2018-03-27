<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    //
    public function getForm(Request $r){

    	$validate=$this->validate($r,
    		[
    			'email'=>'required|email',
    			'password'=>'required',
    			'g-recaptcha-response' => 'required|captcha',
    		]);

    	  \Session::put('success', 'Youe Request Submited Successfully..!!');
        return redirect()->back();
    }
}
