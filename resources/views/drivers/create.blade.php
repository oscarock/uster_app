@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear nuevo conductor</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('drivers.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="surname" class="form-label">Apellido</label>
                <input type="text" name="surname" class="form-control" id="surname" value="{{ old('surname') }}" required>
            </div>

            <div class="mb-3">
                <label for="license" class="form-label">Licencia</label>
                <select name="license" class="form-select" id="license" required>
                    <option value="A" {{ old('license') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('license') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('license') == 'C' ? 'selected' : '' }}>C</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
