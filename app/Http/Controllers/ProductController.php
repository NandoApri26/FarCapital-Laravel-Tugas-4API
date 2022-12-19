<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('Product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        return view('Product.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    // menampilkan isi data
    {
        $img = $request->file('product_image');//Menggambil file dari form
        $filename = time(). "-". $img->getClientOriginalName(); //mengambil dan mengedit nama file dari form
        $img->move('img/', $filename); //proses memasukkan file kedalam direktori laravel
    
        Product::create(
            [
                "product_name" => $request->product_name,
                "product_stock" => $request->product_stock,
                "product_price" => $request->product_price,
                "product_image" => $filename,
                "product_description" => $request->product_description,
            ]
        );
        return redirect('/Product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('Product.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // $product = Product::all();
        return view('Product.update', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // return $request;
        
        if($request ->image !=null){
            $img = $request->file('product_image'); //mengambil dari form
            $filename = time() . "_" . $img->getClientOriginalName();
            $img->move('img', $filename);
        Product::where('id', $product->id)->update(
                [
                    "product_name" => $request->product_name,
                    "product_stock" => $request->product_stock,
                    "product_price" => $request->product_price,
                    "product_image" => $filename,
                    "product_description" => $request->product_description
                ]
            );

        }else{
            Product::where('id', $product->id)->update(
            [
                "product_name" => $request->product_name,
                "product_stock" => $request->product_stock,
                "product_price" => $request->product_price,
                "product_description" => $request->product_description
            ]
            );

        }
        return redirect('/Product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/Product');
    }
}
