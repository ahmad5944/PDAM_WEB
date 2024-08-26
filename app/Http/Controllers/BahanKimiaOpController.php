<?php

namespace App\Http\Controllers;

use App\Models\BahanKimia;
use Illuminate\Http\Request;
use App\Models\BahanKimiaOp;
use App\Models\JenisBahanKimia;
use App\Models\Satuan;
use App\Models\Vendor;

use RealRashid\SweetAlert\Facades\Alert;

class BahanKimiaOpController extends Controller
{
    public static $pageTitle = 'Bahan Kimia';
    public static $routePath = 'bahanKimiaOp';
    public static $folderPath = 'operator/bahanKimia';
    public static $permissionName = 'bahanKimiaOp';
    public static $pageBreadcrumbs = [];

    function __construct()
    {
        // $this->middleware('permission:bahanKimia-list', ['only' => ['index']]);
        // $this->middleware('permission:bahanKimia-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:bahanKimia-edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:bahanKimia-delete', ['only' => ['destroy']]);
        // $this->middleware('permission:bahanKimia-show', ['only' => ['show']]);

        self::$pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath,
            'title' => 'List ' . self::$pageTitle,
        ];
    }
    public function index()
    {
        $datas = BahanKimiaOp::with('jenisBahanKimia','vendor','satuan')->orderBy('created_at', 'DESC')->get();
        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;

        return view(self::$folderPath . '.index', compact('datas', 'pageTitle', 'pageBreadcrumbs'));
    }
    
    public function create(Request $request)
    {
        $data = new BahanKimiaOp();
        $listBahanKimia = JenisBahanKimia::all();

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/' . self::$routePath . '/create',
            'title' => 'Tambah ' . self::$pageTitle,
        ];

        return view(self::$folderPath . '.create', compact('data', 'pageTitle', 'pageBreadcrumbs', 'listBahanKimia'));
    }

    public function store(Request $request)
    {
        $req = $request->all();
        if ($request->hasFile('photo')) {
            $path_cms = 'public/images/';

            $image = $request->file('photo');
            $image_name = $image->getClientOriginalName();
            $request->file('photo')->storeAs($path_cms, $image_name);

            $req['photo'] = '/' . $image_name;
        }
        BahanKimiaOp::create($req);

        $stokMsBahanKimia = BahanKimia::where('jenis_bahan_kimia_id', $req['jenis_bahan_kimia_id'])->first();
        $stok = $stokMsBahanKimia->stok - $req['stok_pemakaian'];
        $stokMsBahanKimia->update(['stok' => $stok]);

        Alert::success('Berhasil', 'Data Berhasil diTambahkan');
        return redirect()->route(self::$routePath . '.index');
    }

    public function show(Request  $request, $id)
    {
        $data = BahanKimiaOp::find($id);

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
        $data = BahanKimiaOp::find($id);
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

    public function update(Request $request, BahanKimiaOp $product)
    {
        $req = $request->all();
        if ($request->hasFile('photo')) {
            $path_cms = 'public/images/';

            $image = $request->file('photo');
            $image_name = $image->getClientOriginalName();
            $request->file('photo')->storeAs($path_cms, $image_name);

            $req['photo'] = '/' . $image_name;
        }
        $product->update($req);

        Alert::success('Berhasil', 'User Berhasil diUpdate');
        return redirect()->route(self::$routePath . '.index');
    }

    public function destroy(Request $request, $id)
    {
        $data = BahanKimiaOp::find($id);
        BahanKimiaOp::find($id)->delete();

        Alert::success('Berhasil', 'Data Berhasil diHapus');
        return redirect()->route(self::$routePath . '.index');
    }
}