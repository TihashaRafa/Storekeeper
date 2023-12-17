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

    public function sale(){

        $products = Product::all();
        return view("backend.pages.product.sale", compact("products"));
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



    public function processSale(Request $request)
    {
        // Retrieve the product ID from the request
        $productId = $request->input('product_id');  // Ensure this matches the name in your form
    
        // Retrieve the new product quantity from the request
        $newQuantity = $request->input('product_quantity');  // Ensure this matches the name in your form
    
        // Find the product by its ID
        $product = Product::find($productId);
    
        // Check if the product exists
        if (is_null($product)) {
            return back()->with('error', 'Product not found.');
        }
    
        // Update the product's quantity and save the changes
        $product->product_quantity = $newQuantity;
        $product->save();
    
        return back()->with('success', 'Product quantity updated successfully!');
    }
    

}
