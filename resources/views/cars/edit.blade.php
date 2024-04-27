@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Redaguojama mašina') }}
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('cars.update', $car) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Registracinis numeris:</label>
                                <input type="text" class="form-control" name="reg_number" value="{{ $car->reg_number }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Brendas:</label>
                                <input type="text" class="form-control" name="brand" value="{{ $car->brand }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Modelis:</label>
                                <input type="text" class="form-control" name="model" value="{{ $car->model }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pavardė:</label>
                                <input type="text" class="form-control" name="surname" value="{{ $car->surname }}">
                            </div>

                                @if ($car->document_file!=null)
                                <div class="mb-3 alert alert-info">

                                        Dokumentas:
                                        <a href="{{  route('car.document', $car->id) }}">
                                            {{ $car->document_name }}
                                        </a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="{{  route('car.documentDelete', $car->id) }}" class="btn btn-danger btn-sm ">Ištrinti</a>

                                    </div>
                                @endif

                                <div class="mb-3">
                                    <label class="form-label">Dokumentai</label>
                                    <input type="file" class="form-control" name="document" >
                                </div>
                            <button class="btn btn-success">Atnaujinti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
