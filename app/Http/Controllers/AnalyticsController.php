<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;

class AnalyticsController extends Controller
{
    public function index()
    {
        // Suponiendo que tengas una lógica similar para obtener los datos de ingresos
        $totalIncome = Income::sum('amount');
        $percentage = $totalIncome * 0.10;

        $monthlyIncome = Income::selectRaw('MONTH(date) as month, SUM(amount) as total')
                                ->groupBy('month')
                                ->get();

        $dailyIncome = Income::selectRaw('DATE(date) as date, SUM(amount) as total')
                              ->groupBy('date')
                              ->get();

        $yearlyIncome = Income::selectRaw('YEAR(date) as year, SUM(amount) as total')
                               ->groupBy('year')
                               ->get();

        return view('analytics.index', compact('totalIncome', 'percentage', 'monthlyIncome', 'dailyIncome', 'yearlyIncome'));
    }
}
