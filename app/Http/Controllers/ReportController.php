<?php

namespace App\Http\Controllers;

use App\Exports\KegiatanExport;
use App\Exports\KualitasAirExport;
use App\Exports\StandMeterExport;
use Illuminate\Http\Request;
use App\Models\StandMeter;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class ReportController extends Controller
{
    public static $pageTitle = 'Report';
    public static $routePath = 'report';
    public static $folderPath = 'report';
    public static $permissionName = 'report';
    public static $pageBreadcrumbs = [];

    function __construct()
    {
        self::$pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath,
            'title' => 'List ' . self::$pageTitle,
        ];
    }
    public function index()
    {
        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;

        return view(self::$folderPath . '.index', compact( 'pageTitle', 'pageBreadcrumbs'));
    }

    public function report(Request $request)
    {
        $jenis = $request->jenis;  

        if ($jenis == 'kualitasAir') {
            return Excel::download(new KualitasAirExport, 'kualitas_air_report.xlsx');
        } elseif ($jenis == 'kegiatan') {
            return Excel::download(new KegiatanExport, 'kegiatan_report.xlsx');
        } elseif ($jenis == 'standMeter') {
            return Excel::download(new StandMeterExport, 'stand_meter_report.xlsx');
        } else {
            Alert::error('Error', 'Jenis laporan tidak ditemukan.');
            return redirect()->back();
        }
    }
}