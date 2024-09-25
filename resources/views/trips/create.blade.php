@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear un Nuevo Viaje</h2>
    <form action="{{ route('trips.create.step.two') }}" method="GET">
        <div class="mb-3">
            <label for="date" class="form-label">Fecha del Viaje:</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <button type="submit" class="btn btn-primary">Seleccionar Vehículo</button>
    </form>
</div>
@endsection