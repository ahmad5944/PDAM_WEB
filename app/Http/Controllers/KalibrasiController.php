<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kalibrasi;

use RealRashid\SweetAlert\Facades\Alert;

class KalibrasiController extends Controller
{
    public static $pageTitle = 'Kalibrasi';
    public static $routePath = 'kalibrasi';
    public static $folderPath = 'kalibrasi';
    public static $permissionName = 'kalibrasi';
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
        $datas = Kalibrasi::orderBy('created_at', 'DESC')->get();

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;

        return view(self::$folderPath . '.index', compact('datas', 'pageTitle', 'pageBreadcrumbs'));
    }
    
    public function create(Request $request)
    {
        $data = new Kalibrasi();

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
        $rules = [
            'unit'              => 'required',
            'air_baku'               => 'required',
            'air_bersih'             => 'required',
            'ph'             => 'required',
            'jam'             => 'required',
        ];

        $custom_messages = [
            'unit.required'             => 'Unit tidak boleh kosong !',
            'air_baku.required'              => 'Air Baku tidak boleh kosong !',
            'air_bersih.required'              => 'Air Bersih tidak boleh kosong !',
            'ph.required'              => 'Ph tidak boleh kosong !',
            'jam.required'              => 'Jam tidak boleh kosong !',
        ];

        $this->validate($request, $rules, $custom_messages);

        Kalibrasi::create($req);

        Alert::success('Berhasil', 'Data Berhasil diTambahkan');
        return redirect()->route(self::$routePath . '.index');
    }

    public function show(Request  $request, $id)
    {
        $data = Kalibrasi::find($id);

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
        $data = Kalibrasi::find($id);

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath . '/' . $id . '/edit',
            'title' => 'Edit ' . self::$pageTitle,
        ];

        return view(self::$folderPath . '.edit', compact('data', 'pageTitle', 'pageBreadcrumbs'));
    }

    public function update(Request $request, Kalibrasi $product)
    {
        $req = $request->all();
        $rules = [
            'unit'              => 'required',
            'air_baku'               => 'required',
            'air_bersih'             => 'required',
            'ph'             => 'required',
            'jam'             => 'required',
        ];

        $custom_messages = [
            'unit.required'             => 'Unit tidak boleh kosong !',
            'air_baku.required'              => 'Air Baku tidak boleh kosong !',
            'air_bersih.required'              => 'Air Bersih tidak boleh kosong !',
            'ph.required'              => 'Ph tidak boleh kosong !',
            'jam.required'              => 'Jam tidak boleh kosong !',
        ];

        $this->validate($request, $rules, $custom_messages);

        $product->update($req);

        Alert::success('Berhasil', 'User Berhasil diUpdate');
        return redirect()->route(self::$routePath . '.index');
    }

    public function destroy(Request $request, $id)
    {
        $data = Kalibrasi::find($id);
        Kalibrasi::find($id)->delete();

        Alert::success('Berhasil', 'Data Berhasil diHapus');
        return redirect()->route(self::$routePath . '.index');
    }
}