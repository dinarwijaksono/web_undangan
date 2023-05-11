<?php

namespace App\Http\Controllers;

use App\Services\Asset_service;
use Illuminate\Http\Request;

class Asset_controller extends Controller
{
    public $asset_service;

    function __construct(Asset_service $asset_service)
    {
        $this->asset_service = $asset_service;
    }


    public function index()
    {
        $data['assetList'] = collect($this->asset_service->getAll());

        return view('Asset/index', $data);
    }



    public function addAsset()
    {
        return view('Asset/add_asset');
    }

    public function doAddAsset(Request $request)
    {
        $file = $request->file('file');

        $request->validate([
            'name' => 'required',
            'fileType' => 'required',
            'file' => 'required'
        ]);

        $request['name'] = $request->input('fileType') . '/' . $request->name . '.' . strtolower($file->getClientOriginalExtension());

        $request->validate([
            'name' => 'unique:assets,name',
        ]);

        if ($request->input('fileType') == 'css' && strtolower($file->getClientOriginalExtension()) != 'css') {
            return back()->with('addAssetError', 'Format file salah.');
        }

        if ($request->input('fileType') == 'javascript' && strtolower($file->getClientOriginalExtension()) != 'js') {
            return back()->with('addAssetError', 'Format file salah.');
        }

        if ($request->input('fileType') == 'image') {
            if (!in_array(strtolower($file->getClientOriginalExtension()), ['jpg', 'png', 'jpeg'])) {
                return back()->with('addAssetError', 'Format file salah.');
            };
        }

        $this->asset_service->create($request->input('name'), $request->input('fileType'));

        $file->storePubliclyAs("", $request->input('name'), 'public_custom');

        return back()->with('addAssetSuccess', 'File berhasil tersimpan.');
    }
}
