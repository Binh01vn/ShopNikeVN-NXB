<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class Productontroller extends Controller
{
    const PATH_VIEW = 'client.products.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prdData = Product::query()->where('is_active', '=', '1')->latest('id')->paginate(9);
        $prdDataOld = Product::query()->with(['tags'])->where('is_active', '=', '1')->limit(4)->get();
        $ctlData = Catalogue::query()->latest('id')->get();
        return view(self::PATH_VIEW . 'shop', compact('prdData', 'prdDataOld', 'ctlData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::query()->findOrFail($request->product_id);
        $productVariant = ProductVariant::query()
            ->with(['size', 'color'])
            // ->with(['product_size', 'product_color'])
            // ->where('product_id ', $request->product_id)
            // ->where('product_size_id  ', $request->size_id)
            // ->where('product_color_id  ', $request->color_id)
            ->where([
                'product_id' => $request->product_id,
                'product_size_id' => $request->size_id,
                'product_color_id' => $request->color_id,
            ])
            ->firstOrFail();
        // dd($productVariant);
        if (!isset(session('cart')[$productVariant->id])) {
            $data = $product->toArray()
                + $productVariant->toArray()
                + ['quantityC' => $request->quantityC];
            session()->put('cart.' . $productVariant->id, $data);
        } else {
            $data = session('cart')[$productVariant->id];
            $data['quantityC'] = $request->quantityC;

            session()->put('cart.' . $productVariant->id, $data);
        }
        return redirect()->route('cart.list');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $prdDetail = Product::query()->with(['tags', 'galleries'])->findOrFail($product->id);
        $prdHD = Product::query()->where('is_hot_deal', '=', '1')->limit(8)->get();
        $prdSizes = ProductSize::query()->get();
        $prdColors = ProductColor::query()->get();
        return view(self::PATH_VIEW . 'productDetail', compact('prdDetail', 'prdHD', 'prdSizes', 'prdColors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
