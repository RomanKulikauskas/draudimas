@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Pridėti naują mašiną
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('cars.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Registracinis numeris:</label>
                                <input class="form-control @error('reg_number') is-invalid @enderror" name="reg_number" type="text" value="{{ old('reg_number') }}" >
                                <div class="invalid-feedback">@error('reg_number') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Brendas:</label>
                                <input class="form-control @error('brand') is-invalid @enderror" name="brand" type="text"  value="{{ old('brand') }}" >
                                <div class="invalid-feedback">@error('brand') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Modelis:</label>
                                <input class="form-control @error('model') is-invalid @enderror" name="model" type="text" value="{{ old('model') }}" >
                                <div class="invalid-feedback">@error('model') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sąvininkas:</label>
                                <select name="owner_id" class="form-select">
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}">{{ $owner->name }} {{ $owner->surname }} {{  $owner->phone }} {{ $owner->email }} {{ $owner->address }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-success">Pridėti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
