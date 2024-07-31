@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Análisis de Ingresos</h1>

    <h2>Total de Ingresos: ${{ number_format($totalIncome, 2) }}</h2>
    <h3>10% del Total de Ingresos: ${{ number_format($percentage, 2) }}</h3>

    <h3>Ingresos Mensuales</h3>
    <ul>
        @foreach ($monthlyIncome as $income)
            <li>Mes {{ $income->month }}: ${{ number_format($income->total, 2) }}</li>
        @endforeach
    </ul>

    <h3>Ingresos Diarios</h3>
    <ul>
        @foreach ($dailyIncome as $income)
            <li>Fecha {{ $income->date }}: ${{ number_format($income->total, 2) }}</li>
        @endforeach
    </ul>

    <h3>Ingresos Anuales</h3>
    <ul>
        @foreach ($yearlyIncome as $income)
            <li>Año {{ $income->year }}: ${{ number_format($income->total, 2) }}</li>
        @endforeach
    </ul>
</div>
@endsection
