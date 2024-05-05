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
                                <th>Mašinos</th>
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
                                        @foreach( $owner->cars as $car)
                                            {{ $car->reg_number }} <br>
                                        @endforeach
                                    <td style="width: 100px;">
                                        @can('update', $owner)
                                        <a href="{{ route('owner.edit', $owner) }}" class="btn btn-success">Redaguoti</a>
                                            @endcan
                                    </td>
                                    <td style="width: 100px;">
                                        <form method="post" action="{{ route('owner.delete', $owner) }}">
                                            @csrf
                                            @method("delete")
                                            <button class="btn btn-danger">Ištrinti</button>
                                        </form>
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
