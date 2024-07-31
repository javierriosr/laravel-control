<!-- resources/views/incomes/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Ingresos</h1>

    <!-- Mensaje de éxito -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabla de ingresos -->
    <table class="table table-bordered table-striped">
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
            @forelse ($incomes as $income)
                <tr>
                    <td>{{ $income->id }}</td>
                    <td>${{ number_format($income->amount, 2) }}</td>
                    <td>{{ $income->description }}</td>
                    <td>{{ $income->date }}</td>
                    <td>
                        <!-- Botón de edición -->
                        <a href="{{ route('incomes.edit', $income->id) }}" class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <!-- Formulario de eliminación -->
                        <form action="{{ route('incomes.destroy', $income->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este ingreso?');">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay ingresos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Botón para agregar nuevo ingreso -->
    <a href="{{ route('incomes.create') }}" class="btn btn-primary">
        Agregar Ingreso
    </a>
</div>
@endsection
