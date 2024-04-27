<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CarController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        return view('cars.index', [
            'cars' => Car::with('owner')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create', [
            'owners' => Owner::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        $car = new Car();
        $car->reg_number = $request->reg_number;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->save();
        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('cars.edit', [
            'car' => $car
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $car->update($request->all());
        $car->save();
        return redirect()->route('cars.index');
    }

    public function save($id, CarRequest $request)
    {


        $car = Car::find($id);
        $car->reg_number = $request->reg_number;
        $car->brand = $request->brand;
        $car->model = $request->model;

        if ($request->file('document') !== null) {
            $file = $request->file('document');

            $file->store('/documents');

            $car->document_file = $file->hashName();
            $car->document_name = $file->getClientOriginalName();
        }

        $car->save();
        return redirect()->route('car.index');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }

    public function document($id)
    {
        $car = Car::find($id);

        return response()->download(storage_path() . "/app/documents/" . $car->document_file, $car->document_name);

    }

    public function documentDelete($id)
    {
        $car = Car::find($id);

        unlink(storage_path() . "/app/documents/" . $car->document_file);

        $car->document_file = null;
        $car->document_name = null;
        $car->save();

        return redirect()->route('car.edit', $id);
    }

}
