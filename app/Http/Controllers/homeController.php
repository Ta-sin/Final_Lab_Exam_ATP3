<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Validator;
use App\User;

class homeController extends Controller
{

    function index(Request $req){
   

        $id = 123;
        $name = $req->session()->get('username');
        return view('admin.index', compact('id', 'name'));
    	
    }

    public function create(){
        return view('admin.create');
    }

    public function store(UserRequest $req){
        
     
                $user = new User();
                $user->ename     = $req->ename;
                $user->contact     = $req->contact;
                $user->username         = $req->name;
                $user->password         = $req->pass;
              
                if($user->save()){
                    return redirect()->route('admin.userlist');
                }else{
                    return back();
                }

        	
        }
    

    public function userlist(){
        $users  = User::all();
        return view('admin.userlist')->with('users', $users);
    }

    public function show($id){
        //$user = $id
    	$user = ['id'=> 1, 'name'=>'xyz', 'email'=>'xyz@aiub.edu', 'cgpa'=>4, 'img'=>'abc.png'];
        return view('home.show', $user);
    }

    public function edit($id){
        $user = User::find($id);       
        return view('admin.edit', $user);
    }

    public function update($id, Request $req){

        $user = User::find($id); 
        $user->ename     = $req->ename;
        $user->contact     = $req->contact;
        $user->username         = $req->name;
        $user->password         = $req->pass;
        $user->save();

        return redirect()->route('admin.userlist');
    }

    public function deleted($id){
        $user = User::find($id);       
        return view('admin.delete')/*->with('user', $user)*/;
    }

    public function destroy($id){
        $user = User::find($id) -> delete();

         return redirect()->route('admin.userlist');
    }


}
