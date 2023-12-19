<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admin()
{
    $today = now()->toDateString();
    $productPriceToday = DB::table('products')
        ->whereDate('created_at', $today) 
        ->sum('product_price');

    $yesterday = now()->subDay()->toDateString();
    $productPriceYesterday = DB::table('products')
        ->whereDate('created_at', $yesterday) 
        ->sum('product_price');

    $firstDayOfMonth = now()->startOfMonth()->toDateString();
    $lastDayOfMonth = now()->endOfMonth()->toDateString();
    $productPriceThisMonth = DB::table('products')
        ->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth]) 
        ->sum('product_price');

    $firstDayOfLastMonth = now()->subMonth()->startOfMonth()->toDateString();
    $lastDayOfLastMonth = now()->subMonth()->endOfMonth()->toDateString();
    $productPriceLastMonth = DB::table('products')
        ->whereBetween('created_at', [$firstDayOfLastMonth, $lastDayOfLastMonth])
        ->sum('product_price');

    return view('backend.admin', compact(
        'productPriceToday',
        'productPriceYesterday',
        'productPriceThisMonth',
        'productPriceLastMonth'
    ));
}


}
