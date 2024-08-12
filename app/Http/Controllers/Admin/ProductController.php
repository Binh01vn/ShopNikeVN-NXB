<?php

namespace App\Http\Controllers\Admin;

use App\Models\Catalogue;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

// use Str;
// use DB;
// use Storage;

class ProductController extends Controller
{
    const PATH_VIEW = "admin.products.";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* quan hệ
        $category = Catalogue::query()->first();
        dd($category->product); 1-1
        dd($category->products); 1-n
        */
        $data = Product::query()->with(['catalogue', 'tags'])->get();

        // dd($data->first()->toArray());

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catalogues = Catalogue::query()->pluck('name', 'id')->all();
        $status = [
            'is_active' => 'Is Active',
            'is_hot_deal' => 'Is Hot Deal',
            'is_good_deal' => 'Is Good Deal',
            'is_new_deal' => 'Is New Deal',
            'is_show_home' => 'Is Show Home'
        ];
        $colors = ProductColor::query()->pluck('name', 'id')->all();
        $sizes = ProductSize::query()->pluck('name', 'id')->all();
        $tags = Tag::query()->pluck('name', 'id')->all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('catalogues', 'status', 'colors', 'sizes', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataProduct = $request->except(['product_variants', 'tags', 'product_galleries']);
        $dataProduct['is_active'] ??= 0;
        $dataProduct['is_hot_deal'] ??= 0;
        $dataProduct['is_good_deal'] ??= 0;
        $dataProduct['is_new_deal'] ??= 0;
        $dataProduct['is_show_home'] ??= 0;

        $dataProduct['slug'] = Str::slug($dataProduct['name']) . '-' . $dataProduct['sku'];

        if ($dataProduct['img_thumbnail']) {
            $dataProduct['img_thumbnail'] = Storage::put('products/thumbnail', $dataProduct['img_thumbnail']);
        }

        $dataProductVariantsTmp = $request->product_variants;
        $dataProductVariants = [];
        foreach ($dataProductVariantsTmp as $key => $item) {
            $tmp = explode('-', $key);
            $dataProductVariants[] = [
                'product_size_id' => $tmp[0],
                'product_color_id' => $tmp[1],
                'quantity' => $item['quantity'],
                'image' => $item['image'] ?? null,
            ];
            // dd($key, $item);
        }
        // dd($dataProduct['description']);
        
        $dataProductTags = $request->tags;
        $dataProductGalleries = $request->product_galleries ?: [];
        // dd($dataProductGalleries);
        try {
            DB::beginTransaction();
            
            /** @var Product $product */
            // dd($dataProduct);
            $product = Product::query()->create($dataProduct);
            // $dataProductVariants['product_id '] = $product->id;
            foreach ($dataProductVariants as $dataProductVariant) {

                $dataProductVariant['product_id'] = $product->id;
                // dd($dataProductVariant);

                if ($dataProductVariant['image']) {
                    $dataProductVariant['image'] = Storage::put('products/variants', $dataProductVariant['image']);
                }

                ProductVariant::query()->create($dataProductVariant);
            }

            $product->tags()->sync($dataProductTags);

            foreach ($dataProductGalleries as $image) {
                ProductGallery::query()->create([
                    'product_id' => $product->id,
                    'image' => Storage::put('products/gallerries', $image),
                ]);
            }
            // dd($product['img_thumbnail']);
            DB::commit();
            return redirect(route('admin.products.index'));

        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $model = Product::query()->findOrFail($product->id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $model = Product::query()->findOrFail($product->id);
        $catalogues = Catalogue::query()->where('is_active', '=', '1')->pluck('name', 'id')->all();
        $status = [
            'is_active' => 'Is Active',
            'is_hot_deal' => 'Is Hot Deal',
            'is_good_deal' => 'Is Good Deal',
            'is_new_deal' => 'Is New Deal',
            'is_show_home' => 'Is Show Home'
        ];

        // dd($product);
        return view(self::PATH_VIEW . __FUNCTION__, compact('model', 'catalogues', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $model = Product::query()->findOrFail($product->id);
        // dd($request);
        try {
            DB::beginTransaction();
            $dataProduct = $request->all();
            $dataProduct['is_active'] ??= 0;
            $dataProduct['is_hot_deal'] ??= 0;
            $dataProduct['is_good_deal'] ??= 0;
            $dataProduct['is_new_deal'] ??= 0;
            $dataProduct['is_show_hom'] ??= 0;
            // dd($dataProduct['img_thumbnail']);

            $imgTmp = $model['img_thumbnail'];
            // dd($imgTmp);
            if ($request->hasFile('img_thumbnail')) {
                $dataProduct['img_thumbnail'] = Storage::put('products/thumbnail', $dataProduct['img_thumbnail']);
                $model->update($dataProduct);
                if ($imgTmp) {
                    Storage::delete($imgTmp);
                }
            } else {
                $model->update($dataProduct);
            }
            DB::commit();
            return redirect()->route('admin.products.index');

        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            DB::transaction(function () use ($product) {
                $product->tags()->sync([]);
                $product->galleries()->delete();
                $product->variants()->delete();
                $product->delete();
            }, 3);
            return back();
        } catch (\Exception $e) {
            return back();
        }
    }
}
