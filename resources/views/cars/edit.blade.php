@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Redaguojama  mašina') }}
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('cars.update', $car) }}">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Registracinis numeris:</label>
                                <input type="text" class="form-control" name="name" value="{{$car->reg_number}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Brendas:</label>
                                <input type="text" class="form-control" name="name" value="{{$car->brand}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Modelis:</label>
                                <input type="text" class="form-control" name="name" value="{{$car->model}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pavardė:</label>
                                <input type="text" class="form-control" name="surname" value="">
                            </div>
                            <button class="btn btn-success">Atnaujinti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
