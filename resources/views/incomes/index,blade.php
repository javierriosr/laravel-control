@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Ingresos</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Monto</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incomes as $income)
                <tr>
                    <td>{{ $income->id }}</td>
                    <td>{{ $income->amount }}</td>
                    <td>{{ $income->description }}</td>
                    <td>{{ $income->date }}</td>
                    <td>
                        <a href="{{ route('incomes.edit', $income->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('incomes.destroy', $income->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('incomes.create') }}" class="btn btn-primary">Agregar Ingreso</a>
</div>
@endsection
