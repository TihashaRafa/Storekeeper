<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $products = Product::all();
        return view("backend.pages.product.index", compact("products"));
    }

    public function create(){
        return view("backend.pages.product.add");
    }

    public function store(Request $request)
    {
        $products = new Product();
        $products->product_name = $request->product_name;
        $products->product_price = $request->product_price;
        $products->product_quantity = $request->product_quantity;
      
        $products->save();

        return redirect(route('product.index'))->with('success', 'Products created successfully.');
    }


    public function edit($id)
    {
        $products = Product::findOrFail($id);
        return view('backend.pages.product.edit', compact('products'));
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);
       
        $products->product_name = $request->product_name;
        $products->product_price = $request->product_price;
        $products->product_quantity = $request->product_quantity;
       
        $products->save();

        return redirect(route('product.index'))->with('success', 'Data updated successfully.');
    }

    public function destroy($id){
        Product::destroy($id);
        return redirect(route('product.index'))->with('success','Delete successfully');
    }
}
