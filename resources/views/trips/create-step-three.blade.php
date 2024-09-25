@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Seleccionar un Conductor para el {{ $request->date }} y el vehículo {{ $vehicle->brand }} - {{ $vehicle->model }}</h2>
    <ul class="list-group">
        @if(!$availableDrivers->isEmpty())
            @foreach($availableDrivers as $driver)
                <li class="list-group-item">
                    {{ $driver->name }} {{ $driver->surname }} (Licencia: {{ $driver->license }})
                    <form action="{{ route('trips.store') }}" method="POST" class="float-end">
                        @csrf
                        <input type="hidden" name="driver_id" value="{{ $driver->id }}">
                        <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                        <input type="hidden" name="date" value="{{ $request->date }}">
                        <button type="submit" class="btn btn-success">Reservar Viaje</button>
                    </form>
                </li>
            @endforeach
        @else
            <br>
            <br>
            <h3 class="text-center text-danger">No se encontro ningun conductor disponible</h3>
        @endif
           
    </ul>
</div>
@endsection
