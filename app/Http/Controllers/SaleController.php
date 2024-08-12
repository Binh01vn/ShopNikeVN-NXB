<?php

namespace App\Http\Controllers;

use App\Models\KhuyenMai;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    const PATH_VIEW = "admin.khuyenMai.";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = KhuyenMai::query()->latest('id')->limit(10)->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        KhuyenMai::query()->create($data);
        return redirect(route('admin.khuyenMai.list'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $data = KhuyenMai::query()->findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = KhuyenMai::query()->findOrFail($id);
        $data = $request->all();
        $model->update($data);
        return redirect(route('admin.khuyenMai.list'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = KhuyenMai::query()->findOrFail($id);
        $model->delete();
        return back();
    }
}
