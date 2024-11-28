<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()  {
        $customersByMonth = DB::table('customers')
    ->select(DB::raw('MONTH(bought_date) as month'), DB::raw('COUNT(*) as customer_count'))
    ->groupBy(DB::raw('MONTH(bought_date)'))
    ->orderBy('month')
    ->get();



    $customersByProduct = DB::table('customers')
    ->join('products', 'customers.product_id', '=', 'products.id') // الربط مع جدول المنتجات
    ->select('products.name_en', DB::raw('COUNT(customers.id) as customer_count'))
    ->groupBy('products.name_en')
    ->orderByDesc('customer_count')
    ->get();


    $customersByState = DB::table('customers')
    ->select('state', DB::raw('COUNT(id) as customer_count'))
    ->groupBy('state')
    ->orderByDesc('customer_count')
    ->get();

  
    $customersByStatus = DB::table('customers')
    ->select('status', DB::raw('COUNT(*) as customer_count'))
    ->groupBy('status')
    ->get();
        return view('back.content',compact('customersByMonth','customersByState','customersByStatus' ,'customersByProduct'));
    }
}
