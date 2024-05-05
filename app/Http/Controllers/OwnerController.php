<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Owner::class, 'owner');
    }
    public function create(){
        return view("owner.create");
    }

    public function store(Request $request){
        $owner=new Owner();
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->phone=$request->phone;
        $owner->email=$request->email;
        $owner->address=$request->address;

        $owner->save();
        return redirect()->route('owner.index');
    }

    public function index(){

        return view('owner.index',
            [
                'owners'=>Owner::with('cars')->get()
            ]);
    }

    public function edit($id){
        $owner=Owner::find($id);
        return view('owner.edit',
            [
                'owner'=>$owner
            ]);
    }

    public function save($id, Request $request){
        $owner=Owner::find($id);
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->phone=$request->phone;
        $owner->email=$request->email;
        $owner->address=$request->address;
        $owner->save();
        return redirect()->route('owner.index');
    }

    public function delete($id){
        Owner::destroy($id);
        return redirect()->route('owner.index');
    }
}
