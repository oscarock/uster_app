@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Vehículos</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('vehicles.create') }}" class="btn btn-primary mb-3">Crear nuevo vehículo</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Placa</th>
                    <th>Licencia Requerida</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->brand }}</td>
                        <td>{{ $vehicle->model }}</td>
                        <td>{{ $vehicle->plate }}</td>
                        <td>{{ $vehicle->license_required }}</td>
                        <td>
                            <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este vehículo?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
