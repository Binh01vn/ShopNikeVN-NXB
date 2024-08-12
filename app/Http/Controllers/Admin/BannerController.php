<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    const PATH_VIEWB = "admin.banner.";

    /**
     * Display a listing of the resource.
     */
    public function banner()
    {
        $data = Banner::query()->latest('id')->paginate(5);
        return view(self::PATH_VIEWB . 'index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function formAdd()
    {
        return view(self::PATH_VIEWB . 'create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->except('imgBanner');
        // dd($data);
        if ($request->hasFile('imgBanner')) {
            if ($data['bannerTh'] == 0) {
                $data['imgBanner'] = Storage::put('banners/bannerC3', $request->file('imgBanner'));
            } else {
                $data['imgBanner'] = Storage::put('banners/bannerC2', $request->file('imgBanner'));
            }
        }

        Banner::query()->create($data);
        return redirect(route('admin.bannerMng.bn.banner'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::query()->findOrFail($id);
        return view(self::PATH_VIEWB . 'edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = Banner::query()->findOrFail($id);
        $data = $request->except('imgBanner');
        $data['is_active'] ??= 0;

        if ($request->hasFile('imgBanner')) {
            if ($data['bannerTh'] == 0) {
                $data['imgBanner'] = Storage::put('banners/bannerC3', $request->file('imgBanner'));
            } else {
                $data['imgBanner'] = Storage::put('banners/bannerC2', $request->file('imgBanner'));
            }
        }
        $tmpImgBanner = $model->imgBanner;

        $model->update($data);

        if ($request->hasFile('imgBanner') && Storage::exists($tmpImgBanner)) {
            Storage::delete($tmpImgBanner);
        }

        return redirect(route('admin.bannerMng.bn.banner'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Banner::query()->findOrFail($id);
        // $tmpImgBanner = $data->imgBanner;
        $data->delete();

        if ($data->imgBanner && Storage::exists($data->imgBanner)) {
            Storage::delete($data->imgBanner);
        }
        return back();
    }
}
