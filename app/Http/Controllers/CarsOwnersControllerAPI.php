<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CarsOwnersControllerAPI extends Controller
{
    public function __construct()
    {

    }

    public function cars()
    {
        return Car::all();
    }

    public function car($id)
    {
        $car = Car::find($id);
        if ($car == null) {
            return response()->json(['message' => 'car not found'], 404);
        }
        return $car;
    }

    public function store(Request $request)
    {
        $car = new Car();
        $car->reg_number = $request->reg_number;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->save();
        return $car;
    }
    public function update(Request $request,$id){
        $car=Car::find($id);
        if ($car==null){
            return response()->json(['message'=>'car not found'],404);
        }
        $car->reg_number = $request->reg_number;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->save();
        return $car;
    }
    public function destroy($id){

        $car=Car::find($id);
        if ($car==null){
            return response()->json(['message'=>'car not found'],404);
        }
        $car->delete();
        return $car;
    }
}
