@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Conductores</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('drivers.create') }}" class="btn btn-primary mb-3">Crear nuevo conductor</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Licencia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($drivers as $driver)
                    <tr>
                        <td>{{ $driver->name }}</td>
                        <td>{{ $driver->surname }}</td>
                        <td>{{ $driver->license }}</td>
                        <td>
                            <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este conductor?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
