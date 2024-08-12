<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Catalogue;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Product::query()->where('is_show_home', '=', '1')->limit(10)->latest('id')->get();
        $dataGD = Product::query()->where('is_good_deal', '=', '1')->limit(15)->get();
        $dataCtl = Catalogue::query()->where('is_active', '=', '1')->limit(5)->latest('id')->get();
        $dataBN3 = Banner::query()->where('bannerTh', '=', '0')->limit(3)->latest('id')->get();
        $dataBN2 = Banner::query()->where('bannerTh', '=', '1')->limit(2)->latest('id')->get();
        // dd($data);
        // return view('home');
        return view('index', compact('data', 'dataGD', 'dataCtl', 'dataBN3', 'dataBN2'));
    }

    public function myAcc()
    {
        $model = Order::query()->where('user_id', '=', Auth::user()->id)->get();
        // dd($model);
        return view('client.account.myacc', compact('model'));
    }
    public function hdDetail(string $id)
    {
        $model = OrderItem::query()->where('order_id', $id)->get();
        $order = Order::query()->where('id', $id)->first();
        // dd($model);
        return view('client.account.hoaDonDetail', compact('model', 'order'));
    }
}
