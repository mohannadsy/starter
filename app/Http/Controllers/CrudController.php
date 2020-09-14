<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    
    public function getOffers(){
        return Offer::get();
    }

    // public function store(){
    //     Offer::create([
    //         "name" => "offer3",
    //         "price" => "3000",
    //         "details" => "offer3 details"
    //     ]);
    // }

    public function create(){
        return view("offers.create");
    }

    public function store(Request $request){

        // validate data before insert to database

        $validate = Validator::make($request->all() , $this->getRules() , $this->getMessages());

        if($validate->fails()){
            return  redirect()->back()->withErrors($validate)->withInputs($request->all());
        }

        //insert 

        Offer::create([
            "name" => $request->name,
            "price" => $request->price,
            "details" => $request->details
        ]);

        return redirect()->back()->with(['success'=>'تم اضافة العرض بنجاح']);
        // return redirect()->To('offers.create');
    }

    protected function getMessages(){
        return $error_msg = [
            'name.unique' => 'العرض موجود',
            'price.numeric' => 'السعر يجب ان يكون رقم'
        ];
    }

    protected function getRules(){
        return $rules = [
            'name' => 'required|max:200|unique:offers,name',
            'price' => 'required|numeric',
            "details" => 'required'
        ];
    }

}
