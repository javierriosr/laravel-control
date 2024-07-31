@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Análisis de Ingresos</h1>

    <div class="card mb-4">
        <div class="card-header">{{ __('Total de Ingresos') }}</div>
        <div class="card-body">
            <h2>${{ number_format($totalIncome, 2) }}</h2>
            <h3>{{ __('10% del Total de Ingresos') }}: ${{ number_format($percentage, 2) }}</h3>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">{{ __('Ingresos Mensuales') }}</div>
        <div class="card-body">
            <ul class="list-group">
                @foreach ($monthlyIncome as $income)
                    <li class="list-group-item">Mes {{ $income->month }}: ${{ number_format($income->total, 2) }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">{{ __('Ingresos Diarios') }}</div>
        <div class="card-body">
            <ul class="list-group">
                @foreach ($dailyIncome as $income)
                    <li class="list-group-item">Fecha {{ $income->date }}: ${{ number_format($income->total, 2) }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">{{ __('Ingresos Anuales') }}</div>
        <div class="card-body">
            <ul class="list-group">
                @foreach ($yearlyIncome as $income)
                    <li class="list-group-item">Año {{ $income->year }}: ${{ number_format($income->total, 2) }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
