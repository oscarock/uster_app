@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Viajes</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('trips.create') }}" class="btn btn-primary mb-3">Crear nuevo viaje</a>
        @if($trips->isEmpty())
            <div class="alert alert-info">No hay viajes registrados.</div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Fecha del Viaje</th>
                        <th>Vehículo</th>
                        <th>Conductor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trips as $trip)
                        <tr>
                            <td>{{ $trip->date }}</td>
                            <td>
                                {{ $trip->vehicle->brand }} - {{ $trip->vehicle->model }} <br>
                                Placa: {{ $trip->vehicle->plate }}
                            </td>
                            <td>
                                {{ $trip->driver->name }} {{ $trip->driver->surname }} <br>
                                Licencia: {{ $trip->driver->license }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
