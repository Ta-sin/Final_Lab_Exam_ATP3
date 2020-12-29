<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class loginController extends Controller
{
    public function index(){
    	return view('login.index');
    }

    public function verify(Request $req){
    	

         $user = DB::table('employee')
                    ->where('username', $req->username)
                    ->where('password', $req->password)
                    ->first();

        /*$user = User::where('username', $req->username)
                    ->where('password', $req->password)
                    ->first();*/

    	if(!empty($user)){
    		$req->session()->put('username', $req->username);

    		if($user->type == "admin"){

    		return redirect()->route('home.index');

    		}
    		else{

    		return redirect()->route('employee.index');
   			}
           
            
    	}else{
    		$req->session()->flash('msg', 'invalid username/password');
    		return redirect('/login');
    		//return view('login.index');
    	}
    }

    /* public function Productvery(Request $req){

     	  $employees = DB::table('employee')
                    ->where('ename', $req->ename)
                    ->where('password', $req->password)
                    ->first();


        if(!empty($employees)){


    		$req->session()->put('username', $req->username);
           
            
    		return redirect()->route('employee.index');
    	}else{
    		$req->session()->flash('msg', 'invalid username/password');
    		return redirect('/login');
    		//return view('login.index');
    	}


}*/

}
//$req->session()->put('name', $req->username);
        //$req->session()->put('password', $req->password);
        //$data = $req->session()->get('name');
        //$req->session()->has('name');
        //$req->session()->forget('name');
        //$req->session()->flush();
        //$req->session()->flash('msg', 'invalid username/password');
        //$req->session()->flash('error', 'DB error');
        //$req->session()->keep('msg');
        //$req->session()->reflash();
        //$data =$req->session()->pull('name');
