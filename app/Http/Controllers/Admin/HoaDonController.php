<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class HoaDonController extends Controller
{
    const PATH_VIEW = "admin.HoaDon.";
    public function list()
    {
        $data = Order::query()->with(['orderItems'])->latest('id')->paginate(10);
        return view(self::PATH_VIEW . 'index', compact('data'));
    }

    public function show(string $id)
    {
        $model = Order::query()->with(['orderItems'])->findOrFail($id);
        // dd($model);
        return view(self::PATH_VIEW . 'show', compact('model'));
    }
    public function editHD(string $id)
    {
        $model = Order::query()->findOrFail($id);
        // dd($model);
        return view(self::PATH_VIEW . 'edit', compact('model'));
    }

    public function updateHD(Request $request, string $id)
    {
        $model = Order::query()->findOrFail($id);
        $data = $request->all();
        $model->update($data);
        return back();
    }
}
