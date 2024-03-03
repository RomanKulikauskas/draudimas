@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Vardas</th>
                                <th>Pavardė</th>
                                <th>Telefonas</th>
                                <th>El.Paštas</th>
                                <th>Adresas</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($owners as $owner)
                                <tr>
                                    <td>{{ $owner->name }}</td>
                                    <td>{{ $owner->surname }}</td>
                                    <td>{{ $owner->phone }}</td>
                                    <td>{{ $owner->email }}</td>
                                    <td>{{ $owner->address }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('owner.edit', $owner->id) }}">Redaguoti</a>
                                        <a class="btn btn-danger" href="{{ route('owner.delete', $owner->id) }}">Ištrinti</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
