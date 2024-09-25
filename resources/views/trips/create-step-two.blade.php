@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Seleccionar un Vehículo para el {{ $request->date }}</h2>
    <ul class="list-group">
        @foreach($availableVehicles as $vehicle)
        <li class="list-group-item">
            {{ $vehicle->brand }} - {{ $vehicle->model }} ({{ $vehicle->plate }})
            <a href="{{ route('trips.create.step.three', ['date' => $request->date, 'vehicle_id' => $vehicle->id]) }}" class="btn btn-primary float-end">Seleccionar Conductor</a>
        </li>
        @endforeach
    </ul>
</div>
@endsection
