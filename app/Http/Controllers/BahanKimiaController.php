<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BahanKimia;
use App\Models\JenisBahanKimia;
use App\Models\Satuan;
use App\Models\Vendor;

use RealRashid\SweetAlert\Facades\Alert;

class BahanKimiaController extends Controller
{
    public static $pageTitle = 'Bahan Kimia';
    public static $routePath = 'bahanKimia';
    public static $folderPath = 'bahanKimia';
    public static $permissionName = 'bahanKimia';
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
        $datas = BahanKimia::with('jenisBahanKimia','vendor','satuan')->orderBy('created_at', 'DESC')->get();
        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;

        return view(self::$folderPath . '.index', compact('datas', 'pageTitle', 'pageBreadcrumbs'));
    }
    
    public function create(Request $request)
    {
        $data = new BahanKimia();
        $listBahanKimia = JenisBahanKimia::all();
        $listVendor = Vendor::all();
        $listSatuan = Satuan::all();

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath . '/create',
            'title' => 'Tambah ' . self::$pageTitle,
        ];

        return view(self::$folderPath . '.create', compact('data', 'pageTitle', 'pageBreadcrumbs', 'listBahanKimia', 'listVendor', 'listSatuan'));
    }

    public function store(Request $request)
    {
        $req = $request->all();
        BahanKimia::create($req);

        Alert::success('Berhasil', 'Data Berhasil diTambahkan');
        return redirect()->route(self::$routePath . '.index');
    }

    public function show(Request  $request, $id)
    {
        $data = BahanKimia::find($id);

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
        $data = BahanKimia::find($id);
        $listBahanKimia = JenisBahanKimia::all();
        $listVendor = Vendor::all();
        $listSatuan = Satuan::all();

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath . '/' . $id . '/edit',
            'title' => 'Edit ' . self::$pageTitle,
        ];

        return view(self::$folderPath . '.edit', compact('data', 'pageTitle', 'pageBreadcrumbs' ,'listBahanKimia', 'listVendor', 'listSatuan'));
    }

    public function update(Request $request, BahanKimia $product)
    {
        $req = $request->all();
        $product->update($req);

        Alert::success('Berhasil', 'User Berhasil diUpdate');
        return redirect()->route(self::$routePath . '.index');
    }

    public function destroy(Request $request, $id)
    {
        $data = BahanKimia::find($id);
        BahanKimia::find($id)->delete();

        Alert::success('Berhasil', 'Data Berhasil diHapus');
        return redirect()->route(self::$routePath . '.index');
    }
}