<?php
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CatalogueController;
use App\Http\Controllers\Admin\HoaDonController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->as('admin.')
    ->middleware(['auth', 'isAdmin'])
    ->group(function () {

        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::prefix('catalogues')
            ->as('catalogues.')
            ->group(function () {
                Route::get('/', [CatalogueController::class, 'index'])->name('index');
                Route::get('create', [CatalogueController::class, 'create'])->name('create');
                Route::post('store', [CatalogueController::class, 'store'])->name('store');
                Route::get('show/{id}', [CatalogueController::class, 'show'])->name('show');
                Route::get('{id}/edit', [CatalogueController::class, 'edit'])->name('edit');
                Route::put('{id}/update', [CatalogueController::class, 'update'])->name('update');

                // Khi dùng phương thức delete trong route thì ở phần link xóa phải dùng form bổ sung @method là 'delete'
                // Route::delete('{id}/destroy', [CatalogueController::class, 'destroy'])->name('destroy');
                // Hoặc ta dùng phương thức get thì sẽ không cần dùng form bỏ sung method nữa
                Route::get('{id}/destroy', [CatalogueController::class, 'destroy'])->name('destroy');
            });

        Route::resource('products', ProductController::class);

        Route::prefix('orderMng')
            ->as('orderMng.')
            ->group(function () {
                Route::get('/', [HoaDonController::class, 'list'])->name('hd.list');
                Route::get('showHD/{id}', [HoaDonController::class, 'show'])->name('hd.showHD');
                Route::get('editHD/{id}', [HoaDonController::class, 'editHD'])->name('hd.editHD');
                Route::put('updateHD/{id}', [HoaDonController::class, 'updateHD'])->name('hd.updateHD');
            });

        Route::prefix('bannerMng')
            ->as('bannerMng.')
            ->group(function () {
                Route::get('/', [BannerController::class, 'banner'])->name('bn.banner');
                Route::get('formAdd', [BannerController::class, 'formAdd'])->name('bn.formAdd');
                // Route::post('addBn', [BannerController::class, 'addBn'])->name('bn.addBn');
                Route::post('addBn', [BannerController::class, 'store'])->name('bn.addBn');

                Route::get('{id}/edit', [BannerController::class, 'edit'])->name('bn.edit');
                Route::put('{id}/update', [BannerController::class, 'update'])->name('bn.update');

                Route::get('{id}/destroy', [BannerController::class, 'destroy'])->name('bn.destroy');
            });

        Route::prefix('khuyenMai')
            ->as('khuyenMai.')
            ->group(function () {
                Route::get('/', [SaleController::class, 'index'])->name('list');
                Route::get('create', [SaleController::class, 'create'])->name('create');
                Route::post('store', [SaleController::class, 'store'])->name('store');
                Route::get('{id}/edit', [SaleController::class, 'edit'])->name('edit');
                Route::put('{id}/update', [SaleController::class, 'update'])->name('update');
                Route::get('{id}/destroy', [SaleController::class, 'destroy'])->name('destroy');
            });
        Route::get('{id}/invoice', [InvoiceController::class, 'generateInvoice'])->name('pdf.inHD');
    });