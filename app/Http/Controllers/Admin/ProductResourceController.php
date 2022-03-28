<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCategoryDetail;
use App\Models\ProductImage;
use Illuminate\Support\Facades\File;

class ProductResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $products = Product::with('images')->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ini nanti bantu tambahin sama tampilin error di bladenya 
        // $request->validate([
        //     'name' => 'required',
        //     'price' => 'required',
        //     'desc' => 'required',
        //     'category_id' => 'required',
        //     'image' => 'required',
        // ]);

        $product = Product::create([
            'product_name' => $request->name,
            'price' => $request->price,
            'description' => $request->desc,
            'product_rate' => 0,
            'stock' => $request->stock,
            'weight' => $request->weight
        ]);

        // Query product category
        foreach ($request->categories as $category) {
            ProductCategoryDetail::create([
                'product_id' => $product->id,
                'category_id' => $category
            ]);
        }

        // Query product images
        foreach ($request->file('product') as $image_product) {
            ProductImage::create([
                'product_id' => $product->id,
                'image_name' => $image_product
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::find($id);
        return view('admin.product.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::find($id);
        return view('admin.product.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadImage(Request $request)
    {
        foreach ($request->file('product') as $product_image) {
            $name = 'product_' . time() . '.' . $product_image->getClientOriginalExtension();
            $destinationPath = public_path('/assets/images/product-images');
            $product_image->move($destinationPath, $name);
        }

        return '/assets/images/product-images/' . $name;
    }

    public function revertImage(Request $request)
    {
        return unlink(public_path($request->getContent()));
    }
}