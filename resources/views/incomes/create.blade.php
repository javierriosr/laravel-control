@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Nuevo Ingreso</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('incomes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="amount">Monto:</label>
            <input type="text" name="amount" class="form-control" value="{{ old('amount') }}" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción:</label>
            <input type="text" name="description" class="form-control" value="{{ old('description') }}" required>
        </div>
        <div class="form-group">
            <label for="date">Fecha:</label>
            <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
@endsection
