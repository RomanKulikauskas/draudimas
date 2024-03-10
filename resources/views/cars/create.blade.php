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
                                <input type="text" class="form-control" name="reg_number">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Brendas:</label>
                                <input type="text" class="form-control" name="brand">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Modelis:</label>
                                <input type="text" class="form-control" name="model">
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
