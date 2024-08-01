<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservoar;

use RealRashid\SweetAlert\Facades\Alert;

class ReservoarController extends Controller
{
    public static $pageTitle = 'Reservoar';
    public static $routePath = 'reservoar';
    public static $folderPath = 'reservoar';
    public static $permissionName = 'reservoar';
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
        $datas = Reservoar::orderBy('created_at', 'DESC')->get();

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;

        return view(self::$folderPath . '.index', compact('datas', 'pageTitle', 'pageBreadcrumbs'));
    }
    
    public function create(Request $request)
    {
        $data = new Reservoar();

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath . '/create',
            'title' => 'Tambah ' . self::$pageTitle,
        ];

        return view(self::$folderPath . '.create', compact('data', 'pageTitle', 'pageBreadcrumbs'));
    }

    public function store(Request $request)
    {
        $req = $request->all();

        Reservoar::create($req);

        Alert::success('Berhasil', 'Data Berhasil diTambahkan');
        return redirect()->route(self::$routePath . '.index');
    }

    public function show(Request  $request, $id)
    {
        $data = Reservoar::find($id);

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => self::$routePath . '/' . $id,
            'title' => 'Show ' . self::$pageTitle,
        ];
        $routePath = self::$routePath;

        return view(self::$folderPath . '.show', compact('data', 'pageTitle', 'pageBreadcrumbs', 'routePath'));
    }

    public function edit(Request  $request, $id)
    {
        $data = Reservoar::find($id);

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath . '/' . $id . '/edit',
            'title' => 'Edit ' . self::$pageTitle,
        ];

        return view(self::$folderPath . '.edit', compact('data', 'pageTitle', 'pageBreadcrumbs'));
    }

    public function update(Request $request, Reservoar $product)
    {
        $req = $request->all();
        $product->update($req);

        Alert::success('Berhasil', 'User Berhasil diUpdate');
        return redirect()->route(self::$routePath . '.index');
    }

    public function destroy(Request $request, $id)
    {
        $data = Reservoar::find($id);
        Reservoar::find($id)->delete();

        Alert::success('Berhasil', 'Data Berhasil diHapus');
        return redirect()->route(self::$routePath . '.index');
    }
}