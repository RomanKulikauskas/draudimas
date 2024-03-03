@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Redaguojamas savininkas
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('owner.save', $owner->id) }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Vardas:</label>
                                <input type="text" class="form-control" name="name" value="{{ $owner->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pavardė:</label>
                                <input type="text" class="form-control" name="surname" value="{{ $owner->surname }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Telefonas:</label>
                                <input type="text" class="form-control" name="phone" value="{{ $owner->phone }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">El.Paštas:</label>
                                <input type="text" class="form-control" name="email" value="{{ $owner->email }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Adresas:</label>
                                <input type="text" class="form-control" name="address" value="{{ $owner->address }}">
                            </div>
                            <button class="btn btn-success">Pridėti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
