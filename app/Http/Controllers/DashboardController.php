<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\KualitasAir;

class DashboardController extends Controller
{
    public static $pageTitle = 'Dashboard';

    public static $routePath = 'dashboard';
    public static $pageBreadcrumbs = [];

    public function __construct()
    {
        // $this->middleware('permission:dashboard-list', ['only' => ['index']]);

        self::$pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath,
            'title' => self::$pageTitle,
        ];

        $this->middleware('auth');
    }

    public function index(Request $request){
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $totalAirBaku = KualitasAir::sum('air_baku');
        $totalAirBersih = KualitasAir::sum('air_bersih');
        $kadarPh = KualitasAir::sum('ph');

        return view('dashboard', compact('pageBreadcrumbs', 'totalAirBaku', 'totalAirBersih', 'kadarPh'));
    }

}
