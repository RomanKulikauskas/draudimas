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
                                <input class="form-control @error('reg_number') is-invalid @enderror" name="reg_number" type="text" value="{{ old('reg_number')?: $car->reg_number  }}" >
                                <div class="invalid-feedback">@error('reg_number') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Brendas:</label>
                                <input class="form-control @error('brand') is-invalid @enderror" name="brand" type="text" value="{{ old('brand')?: $car->brand  }}" >
                                <div class="invalid-feedback">@error('brand') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Modelis:</label>
                                <input class="form-control @error('model') is-invalid @enderror" name="model" type="text" value="{{ old('model')?: $car->model  }}" >
                                <div class="invalid-feedback">@error('model') {{ $message }} @enderror</div>
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
