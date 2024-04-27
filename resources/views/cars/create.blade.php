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

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <form method="post" action="{{ route('cars.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">{{ __('Registracinis numeris') }}:</label>
                                <input type="text" class="form-control @error('reg_number') is-invalid @enderror" name="reg_number"  value="{{ old('reg_number') }}" >
                                @error('reg_number') {{ $message }} @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Brendas') }}:</label>
                                <input type="text" class="form-control @error('brand') is-invalid @enderror" name="brand"  value="{{ old('brand') }}" >
                                <div class="invalid-feedback">@error('brand') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Modelis') }}:</label>
                                <input type="text" class="form-control @error('model') is-invalid @enderror" name="model"  value="{{ old('model') }}" >
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
