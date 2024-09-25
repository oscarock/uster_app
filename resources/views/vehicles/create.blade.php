@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear nuevo vehículo</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('vehicles.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="brand" class="form-label">Marca</label>
                <input type="text" name="brand" class="form-control" id="brand" value="{{ old('brand') }}" required>
            </div>

            <div class="mb-3">
                <label for="model" class="form-label">Modelo</label>
                <input type="text" name="model" class="form-control" id="model" value="{{ old('model') }}" required>
            </div>

            <div class="mb-3">
                <label for="plate" class="form-label">Placa</label>
                <input type="text" name="plate" class="form-control" id="plate" value="{{ old('plate') }}" required>
            </div>

            <div class="mb-3">
                <label for="license_required" class="form-label">Licencia Requerida</label>
                <select name="license_required" class="form-select" id="license_required" required>
                    <option value="A" {{ old('license_required') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('license_required') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('license_required') == 'C' ? 'selected' : '' }}>C</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
