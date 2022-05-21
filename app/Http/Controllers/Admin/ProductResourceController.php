<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCategoryDetail;
use App\Models\ProductImage;
use App\Models\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


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
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'desc' => 'required',
            'stock' => 'required|numeric',
            'weight' => 'required|numeric',
            'categories' => 'required',
            'product' => 'required',
        ]);

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
        foreach ($request->product as $image_product) {
            ProductImage::create([
                'product_id' => $product->id,
                'image_name' => $image_product
            ]);
        }

        return redirect('/admin/product')->with('success', 'Product has been added.');
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
        $product = Product::find($id);
        $categories = ProductCategory::all();
        return view('admin.product.edit', compact('product', 'categories'));
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
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'desc' => 'required',
            'stock' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);

        $products = ([
            'product_name' => $request->name,
            'price' => $request->price,
            'description' => $request->desc,
            'product_rate' => 0,
            'stock' => $request->stock,
            'weight' => $request->weight
        ]);

        Product::where('id', $id)->update($products);

        return redirect('/admin/product')->with('success', 'Product has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = DB::table('carts')->where('product_id', $id)->get()->count();

        if ($cart && $cart != null && $cart != 0) {
            return redirect('admin/product')->with('danger', 'Product are on user cart');
        } else {
            $image = DB::table('product_images')->where('product_id', $id);
            $image->delete();

            $category = DB::table('product_category_details')->where('product_id', $id);
            $category->delete();

            $discount = DB::table('discounts')->where('product_id', $id);
            $discount->delete();

            Product::where('id', $id)->delete();
            return redirect('admin/product')->with('success', 'Product has been deleted');
        }
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

    public function destroyImage($id)
    {
        $image = ProductImage::find($id);
        $image->delete();
        return redirect()->back()->with('success', 'Image Product has been deleted');
    }

    public function destroyCategory(Product $product, Request $request)
    {
        $product->categories()->detach($request->id);
        return redirect()->back()->with('success', 'Category Product has been deleted');
    }

    public function addCategory(Request $request, $id)
    {
        foreach ($request->categories as $category) {
            $product = Product::find($id);
            ProductCategoryDetail::create([
                'product_id' => $product->id,
                'category_id' => $category
            ]);
        }
        return redirect()->back()->with('success', 'Category Product has been added');
    }

    public function addImage(Request $request, $id)
    {
        // Query product images
        foreach ($request->product as $image_product) {
            $product = Product::find($id);
            ProductImage::create([
                'product_id' => $product->id,
                'image_name' => $image_product
            ]);
        }
        return redirect()->back()->with('success', 'Image Product has been added.');
    }

    public function listReviewProduct($id)
    {
        $data = Product::find($id);
        $reviews = $data->reviews;
        return view('admin.product.review', compact('data', 'reviews'));
    }

    public function responseReview(Request $request, $id)
    {
        $response = Response::whereReviewId($id)->get();
        if (!$response->count() >= 0 && !$response->count() < 1) {
            return redirect()->back()->with('danger', 'Response hanya dapat sekali.');
        }
        Response::create([
            'review_id' => $id,
            'admin_id' => auth()->user('admin')->id,
            'content' => $request->content
        ]);
        return redirect()->back()->with('success', 'Response berhasil ditambahkan.');
    }
}