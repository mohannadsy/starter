<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->only('deleteUser' , 'updateUser');
    }

    public function getIndex(){

        $arr = ['DB' => 'localhost'];
        
        $obj = new \stdClass;
        $obj->name = 'Ahmad';
        $obj->id = 5;
        return view('welcome')->with(compact('obj'));
    }

    public function showUser(){
        return "User";
    }
    

    public function deleteUser(){
        return "Delete";
    }

    public function updateUser(){
        return "Update";
    }

    public function getUser(){
        return "get";
    }

}
