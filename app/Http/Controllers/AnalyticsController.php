<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function index()
    {
        $totalIncome = Income::where('user_id', auth()->id())->sum('amount');
        $monthlyIncome = Income::select(DB::raw('SUM(amount) as total'), DB::raw('MONTH(created_at) as month'))
                                ->where('user_id', auth()->id())
                                ->groupBy('month')
                                ->get();

        $dailyIncome = Income::select(DB::raw('SUM(amount) as total'), DB::raw('DATE(created_at) as date'))
                             ->where('user_id', auth()->id())
                             ->groupBy('date')
                             ->get();

        $yearlyIncome = Income::select(DB::raw('SUM(amount) as total'), DB::raw('YEAR(created_at) as year'))
                              ->where('user_id', auth()->id())
                              ->groupBy('year')
                              ->get();

        $percentage = $totalIncome * 0.10;

        return view('analytics.index', compact('totalIncome', 'monthlyIncome', 'dailyIncome', 'yearlyIncome', 'percentage'));
    }
}
